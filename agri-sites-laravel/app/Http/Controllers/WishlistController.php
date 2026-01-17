<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display wishlist items.
     */
    public function index()
    {
        $wishlists = Wishlist::with('product')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('pages.wishlist', compact('wishlists'));
    }

    /**
     * Add product to wishlist.
     */
    public function add($slug, Request $request)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $exists = Wishlist::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->exists();

        if ($exists) {
            if ($request->wantsJson() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
                return response()->json([
                    'success' => false,
                    'message' => 'Product already in wishlist!',
                ], 400);
            }
            return back()->with('error', 'Product already in wishlist!');
        }

        Wishlist::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
        ]);

        if ($request->wantsJson() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
            $wishlistCount = Wishlist::where('user_id', auth()->id())->count();
            return response()->json([
                'success' => true,
                'message' => 'Product added to wishlist!',
                'product_name' => $product->name,
                'wishlist_count' => $wishlistCount,
                'in_wishlist' => true,
            ]);
        }

        return back()->with('success', 'Product added to wishlist!');
    }

    /**
     * Remove product from wishlist.
     */
    public function remove($slug, Request $request)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        Wishlist::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->delete();

        if ($request->wantsJson() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
            $wishlistCount = Wishlist::where('user_id', auth()->id())->count();
            return response()->json([
                'success' => true,
                'message' => 'Product removed from wishlist!',
                'product_name' => $product->name,
                'wishlist_count' => $wishlistCount,
                'in_wishlist' => false,
            ]);
        }

        return back()->with('success', 'Product removed from wishlist!');
    }
}
