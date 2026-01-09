<?php

namespace App\Http\Controllers;

use App\Models\PortfolioItem;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function index(Request $request): View
    {
        $category = (string) $request->query('category', '');
        $q = trim((string) $request->query('q', ''));

        $query = PortfolioItem::query();
        if ($category !== '') {
            $query->where('category', $category);
        }
        if ($q !== '') {
            $query->where(function ($sub) use ($q) {
                $sub->where('title', 'like', "%$q%")
                    ->orWhere('excerpt', 'like', "%$q%")
                    ->orWhere('description', 'like', "%$q%")
                    ->orWhere('client', 'like', "%$q%")
                    ->orWhere('service', 'like', "%$q%");
            });
        }

        $items = $query->latest('published_at')->latest()->get();
        $categories = PortfolioItem::query()->select('category')->distinct()->orderBy('category')->pluck('category');

        return view('pages.portfolio', compact('items', 'categories', 'category', 'q'));
    }

    public function show(string $slug): View
    {
        $item = PortfolioItem::where('slug', $slug)->firstOrFail();
        $related = PortfolioItem::where('id', '!=', $item->id)->where('category', $item->category)->take(3)->get();
        return view('pages.portfolio-single', compact('item', 'related'));
    }
}
