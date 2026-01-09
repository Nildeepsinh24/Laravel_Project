<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class PagesController extends Controller
{
    public function home(): View
    {
        return view('pages.home');
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

    public function shop(): View
    {
        $products = Product::all();
        return view('pages.shop', compact('products'));
    }

    public function shopSingle($slug): View
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('pages.shop-single', compact('product'));
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

    public function licenses(): View
    {
        return view('pages.licenses');
    }

    public function changelog(): View
    {
        return view('pages.changelog');
    }
}
