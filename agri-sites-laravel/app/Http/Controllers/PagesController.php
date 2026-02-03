<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PagesController extends Controller
{
    public function home(): View
    {
        $products = Product::take(8)->get(['*']);
        
        // Fetch latest 2 published blogs for news section
        $latestBlogs = Blog::where('published_at', '<=', now())
            ->latest('published_at')
            ->take(2)
            ->get(['id', 'title', 'slug', 'excerpt', 'author', 'category', 'published_at']);

        $wishlistIds = [];
        if (auth()->check()) {
            $wishlistIds = Wishlist::where('user_id', '=', auth()->id(), 'and')
                ->pluck('product_id')
                ->all();
        }

        return view('pages.home', compact('products', 'wishlistIds', 'latestBlogs'));
    }

    public function about(): View
    {
        return view('pages.about');
    }

    public function services(): View
    {
        return view('pages.services');
    }

    public function serviceSingle(): View
    {
        return view('pages.service-single');
    }

    public function shop(Request $request): View
    {
        $q = trim((string) $request->input('q', ''));
        $query = Product::query();
        if ($q !== '') {
            $like = "%$q%";
            $query->whereRaw(
                '(name LIKE ? OR category LIKE ? OR description LIKE ? OR additional_info LIKE ?)',
                [$like, $like, $like, $like],
                'and'
            );
        }
        $products = $query->get(['*']);
        return view('pages.shop', compact('products'));
    }

    public function shopSingle($slug): View
    {
        $product = Product::where('slug', '=', $slug, 'and')->firstOrFail();
        $relatedProducts = Product::where('id', '!=', $product->id, 'and')->take(4)->get(['*']);
        return view('pages.shop-single', compact('product', 'relatedProducts'));
    }

    public function contact(): View
    {
        return view('pages.contact');
    }

    public function blogSingle(): View
    {
        $blog = Blog::where('published_at', '<=', now(), 'and')
            ->latest('published_at')
            ->firstOrFail();

        $relatedBlogs = Blog::where('id', '!=', $blog->id, 'and')
            ->where('category', '=', $blog->category, 'and')
            ->where('published_at', '<=', now(), 'and')
            ->latest('published_at')
            ->limit(3)
            ->get(['*']);

        return view('pages.blog-single', compact('blog', 'relatedBlogs'));
    }

    public function blogShow($slug): View
    {
        $blog = Blog::where('slug', '=', $slug, 'and')->firstOrFail();
        return view('pages.blog-show', compact('blog'));
    }

    public function news(): View
    {
        $blogs = Blog::where('published_at', '<=', now(), 'and')->latest('published_at')->get(['*']);
        return view('pages.news', compact('blogs'));
    }

    public function team(): View
    {
        return view('pages.team');
    }

    public function errorPage(): View
    {
        return view('pages.error');
    }

    public function newsletterSubscribe(Request $request)
    {
        $data = $request->validate(['email' => 'required|email']);
        // In a real app, store $data['email'] or send to a provider.
        return back()->with('newsletter_status', 'Thanks for subscribing!');
    }
}
