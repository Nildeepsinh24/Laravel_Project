<?php
require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

echo "========== CREATING CATEGORIES & ASSIGNING PRODUCTS ==========\n\n";

// Define categories with their products
$categoriesData = [
    'Nuts & Seeds' => [
        'Brown Hazelnut',
        'White Hazelnut',
        'Organic Almonds',
        'White Nuts',
        'Chia Seeds',
        'Flax Seeds',
    ],
    'Vegetables' => [
        'Calabrese Broccoli',
        'Vegan Red Tomato',
        'Organic Spinach',
        'Organic Carrots',
        'Bell Peppers Mix',
        'Organic Cucumber',
    ],
    'Fruits' => [
        'Fresh Banana Fruites',
    ],
    'Grains & Flour' => [
        'Organic Wheat Flour',
        'Organic Rice',
        'Zelco Suji Elaichi Rusk',
    ],
    'Proteins' => [
        'Eggs',
        'Free-Range Chicken',
        'Mung Bean',
        'Lentil Mix',
    ],
    'Pantry Essentials' => [
        'Raw Honey Jar',
        'Virgin Olive Oil',
        'Organic Tea Set',
        'Fresh Corn',
    ],
];

// Create categories and assign products
foreach ($categoriesData as $categoryName => $productNames) {
    // Create category
    $category = Category::firstOrCreate(
        ['name' => $categoryName],
        ['slug' => Str::slug($categoryName)]
    );
    
    echo "Created Category: $categoryName (ID: {$category->id})\n";
    
    // Assign products to this category
    foreach ($productNames as $productName) {
        $product = Product::where('name', $productName)->first();
        if ($product) {
            $product->update(['category_id' => $category->id]);
            echo "  ✓ Assigned: $productName (ID: {$product->id})\n";
        } else {
            echo "  ✗ Product not found: $productName\n";
        }
    }
    echo "\n";
}

echo "========== VERIFICATION ==========\n\n";

$categories = Category::with('products')->orderBy('name')->get();
foreach ($categories as $category) {
    echo "{$category->name}: {$category->products->count()} products\n";
}

echo "\nUncategorized products: " . Product::whereNull('category_id')->count() . "\n";
echo "\nTotal categories: " . Category::count() . "\n";
