<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::with(['products' => function($query) {
            $query->orderBy('id', 'desc');
        }])->orderBy('name')->get();
        
        $uncategorized = Product::whereNull('category_id')->orderBy('id', 'desc')->get();
        
        return view('admin.products.index', compact('categories', 'uncategorized'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'original_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'rating' => 'nullable|integer|min:0|max:5',
            'slug' => 'required|string|unique:products,slug',
            'image' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        Product::create($data);
        return redirect()->route('admin.products.index')->with('success', 'Product created');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $productId = $product->getKey();
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'original_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'rating' => 'nullable|integer|min:0|max:5',
            'slug' => 'required|string|unique:products,slug,' . $productId,
            'image' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $product->update($data);
        return redirect()->route('admin.products.index')->with('success', 'Product updated');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }
}
