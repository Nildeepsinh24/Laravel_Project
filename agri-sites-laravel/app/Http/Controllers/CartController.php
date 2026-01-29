<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = $request->session()->get('cart', ['items' => [], 'total_qty' => 0, 'total_price' => 0]);
        return view('pages.cart', compact('cart'));
    }

    public function add(Request $request, string $slug)
    {
        try {
            $product = Product::where('slug', $slug)->firstOrFail();
            $qty = max(1, (int) $request->input('quantity', 1));

            $cart = $request->session()->get('cart', ['items' => [], 'total_qty' => 0, 'total_price' => 0]);

            $key = (string) $product->id;
            if (!isset($cart['items'][$key])) {
                $cart['items'][$key] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'slug' => $product->slug,
                    'image' => $product->image,
                    'price' => (float) $product->sale_price,
                    'qty' => 0,
                ];
            }

            $cart['items'][$key]['qty'] += $qty;

            // Recompute totals
            $cart['total_qty'] = 0;
            $cart['total_price'] = 0;
            foreach ($cart['items'] as $item) {
                $cart['total_qty'] += $item['qty'];
                $cart['total_price'] += $item['qty'] * $item['price'];
            }

            $request->session()->put('cart', $cart);
            
            // Return JSON for AJAX requests
            if ($request->wantsJson() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
                return response()->json([
                    'success' => true,
                    'product_name' => $product->name,
                    'cart_count' => $cart['total_qty'],
                    'cart_total' => number_format($cart['total_price'], 2),
                    'message' => 'Added to cart successfully'
                ]);
            }
            
            return redirect()->route('cart.index')->with('status', 'Added to cart');
        } catch (\Exception $e) {
            \Log::error('Error adding to cart: ' . $e->getMessage());
            
            if ($request->wantsJson() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
                return response()->json([
                    'success' => false,
                    'message' => 'Error adding product to cart'
                ], 500);
            }
            
            return redirect()->back()->with('error', 'Error adding to cart');
        }
    }

    public function update(Request $request, string $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $qty = max(0, (int) $request->input('quantity', 1));

        $cart = $request->session()->get('cart', ['items' => [], 'total_qty' => 0, 'total_price' => 0]);
        $key = (string) $product->id;
        if (isset($cart['items'][$key])) {
            if ($qty === 0) {
                unset($cart['items'][$key]);
            } else {
                $cart['items'][$key]['qty'] = $qty;
            }
        }

        $cart['total_qty'] = 0;
        $cart['total_price'] = 0;
        foreach ($cart['items'] as $item) {
            $cart['total_qty'] += $item['qty'];
            $cart['total_price'] += $item['qty'] * $item['price'];
        }

        $request->session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('status', 'Cart updated');
    }

    public function remove(Request $request, string $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $cart = $request->session()->get('cart', ['items' => [], 'total_qty' => 0, 'total_price' => 0]);
        $key = (string) $product->id;
        if (isset($cart['items'][$key])) {
            unset($cart['items'][$key]);
        }

        $cart['total_qty'] = 0;
        $cart['total_price'] = 0;
        foreach ($cart['items'] as $item) {
            $cart['total_qty'] += $item['qty'];
            $cart['total_price'] += $item['qty'] * $item['price'];
        }

        $request->session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('status', 'Item removed');
    }

    public function clear(Request $request)
    {
        $request->session()->forget('cart');
        return redirect()->route('cart.index')->with('status', 'Cart cleared');
    }

    public function checkout(Request $request)
    {
        $cart = $request->session()->get('cart', ['items' => [], 'total_qty' => 0, 'total_price' => 0]);
        return view('pages.checkout', compact('cart'));
    }

    public function processCheckout(Request $request)
    {
        \Log::info('Checkout form submitted', $request->all());
        
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip' => 'required|string',
            'country' => 'required|string',
            'notes' => 'nullable|string',
            'payment_method' => 'required|in:cod,card',
        ]);
        
        \Log::info('Validation passed', $validated);

        $cart = $request->session()->get('cart', ['items' => [], 'total_qty' => 0, 'total_price' => 0]);

        if (empty($cart['items'])) {
            return redirect()->route('cart.index')->with('status', 'Your cart is empty');
        }

        // Compute subtotal, tax and total
        $subtotal = $cart['total_price'];
        $taxRate = config('cart.tax_rate', 0);
        $taxAmount = round(($subtotal * $taxRate) / 100, 2);
        $totalAmount = round($subtotal + $taxAmount, 2);

        // Create order with tax/subtotal breakdown (attach user if authenticated)
        $orderData = [
            'order_number' => 'ORD-' . strtoupper(uniqid()),
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'city' => $validated['city'],
            'state' => $validated['state'],
            'zip' => $validated['zip'],
            'country' => $validated['country'],
            'notes' => $validated['notes'],
            'payment_method' => $validated['payment_method'],
            'subtotal' => $subtotal,
            'tax_amount' => $taxAmount,
            'total_amount' => $totalAmount,
            'status' => 'pending',
        ];

        if ($request->user()) {
            $orderData['user_id'] = $request->user()->id;
        }

        $order = Order::create($orderData);

        // Create order items (store unit_price and total_price)
        foreach ($cart['items'] as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_name' => $item['name'],
                'quantity' => $item['qty'],
                'unit_price' => $item['price'],
                'total_price' => $item['qty'] * $item['price'],
            ]);
        }

        // Clear cart
        $request->session()->forget('cart');

        // Redirect to order confirmation
        return redirect()->route('order.confirmation', $order->id);
    }

    public function showConfirmation(Order $order)
    {
        return view('pages.order-confirmation', compact('order'));
    }

    public function printBill(Order $order)
    {
        return view('pages.order-print', compact('order'));
    }
}
