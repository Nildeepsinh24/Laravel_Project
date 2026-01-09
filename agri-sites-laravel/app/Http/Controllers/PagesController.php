<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PagesController extends Controller
{
    public function home(): View
    {
        $products = Product::take(8)->get();
        return view('pages.home', compact('products'));
    }

    public function about(): View
    {
        return view('pages.about');
    }

    public function portfolio(): View
    {
        return view('pages.portfolio');
    }

    public function portfolioSingle(): View
    {
        return view('pages.portfolio-single');
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
            $query->where(function ($sub) use ($q) {
                $sub->where('name', 'like', "%$q%")
                    ->orWhere('category', 'like', "%$q%")
                    ->orWhere('description', 'like', "%$q%")
                    ->orWhere('additional_info', 'like', "%$q%");
            });
        }
        $products = $query->get();
        return view('pages.shop', compact('products'));
    }

    public function shopSingle($slug): View
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $relatedProducts = Product::where('id', '!=', $product->id)->take(4)->get();
        return view('pages.shop-single', compact('product', 'relatedProducts'));
    }

    public function contact(): View
    {
        return view('pages.contact');
    }

    public function blogSingle(): View
    {
        return view('pages.blog-single');
    }

    public function news(): View
    {
        return view('pages.recent');
    }

    public function team(): View
    {
        return view('pages.team');
    }

    public function styleGuide(): View
    {
        return view('pages.style-guide');
    }

    public function errorPage(): View
    {
        return view('pages.error');
    }

    public function password(): View
    {
        return view('pages.password-protect');
    }

    public function passwordSubmit(Request $request)
    {
        $request->validate(['password' => 'required|string']);
        return redirect()->route('password')->with('status', 'Password submitted (demo)');
    }

    public function licenses(): View
    {
        return view('pages.licenses');
    }

    public function changelog(): View
    {
        return view('pages.changelog');
    }

    public function newsletterSubscribe(Request $request)
    {
        $data = $request->validate(['email' => 'required|email']);
        // In a real app, store $data['email'] or send to a provider.
        return back()->with('newsletter_status', 'Thanks for subscribing!');
    }
}
