<?php
require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Product;
use App\Models\Category;

echo "========== PRODUCT CATEGORY ANALYSIS ==========\n\n";

// Total products
$totalProducts = Product::count();
echo "Total Products: $totalProducts\n";

// Products with category_id
$withCategoryId = Product::whereNotNull('category_id')->count();
echo "Products with category_id: $withCategoryId\n";

// Products without category_id
$withoutCategoryId = Product::whereNull('category_id')->count();
echo "Products without category_id (uncategorized): $withoutCategoryId\n";

echo "\n========== PRODUCTS BY CATEGORY ==========\n\n";

$categories = Category::with('products')->get();

if ($categories->isEmpty()) {
    echo "No categories found in database!\n";
} else {
    foreach ($categories as $category) {
        echo "Category: {$category->name} (ID: {$category->id}) - {$category->products->count()} products\n";
        foreach ($category->products as $product) {
            echo "  - {$product->name} (ID: {$product->id}, category_id: {$product->category_id})\n";
        }
        echo "\n";
    }
}

if ($withoutCategoryId > 0) {
    echo "========== UNCATEGORIZED PRODUCTS ==========\n\n";
    $uncategorized = Product::whereNull('category_id')->get();
    foreach ($uncategorized as $product) {
        echo "- {$product->name} (ID: {$product->id})\n";
    }
}

echo "\n========== DATABASE CHECK ==========\n\n";
echo "Categories table: " . Category::count() . " records\n";
echo "Products table: " . Product::count() . " records\n";
