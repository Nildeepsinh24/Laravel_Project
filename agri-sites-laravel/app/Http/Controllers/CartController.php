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
}
