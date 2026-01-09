<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        return redirect()->route('cart.index')->with('status', 'Added to cart');
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

        $cart = $request->session()->get('cart', ['items' => [], 'total_qty' => 0, 'total_price' => 0]);

        if (empty($cart['items'])) {
            return redirect()->route('cart.index')->with('status', 'Your cart is empty');
        }

        // In a real application, you would:
        // 1. Create an order record in the database
        // 2. Process payment if needed
        // 3. Send confirmation email
        // 4. Update inventory
        
        // For now, we'll just clear the cart and show success
        $request->session()->forget('cart');
        
        return redirect()->route('shop')->with('success', 'Order placed successfully! Order confirmation has been sent to ' . $validated['email']);
    }
}
