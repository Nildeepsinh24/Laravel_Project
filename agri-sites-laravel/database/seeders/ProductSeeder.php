<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Mung Bean',
                'category' => 'Health',
                'image' => 'card-8.png',
                'original_price' => 20.00,
                'sale_price' => 11.00,
                'rating' => 5,
                'description' => 'Fresh organic mung beans',
            ],
            [
                'name' => 'Brown Hazelnut',
                'category' => 'Nuts',
                'image' => 'Photo__2_-removebg-preview.png',
                'original_price' => 20.00,
                'sale_price' => 12.00,
                'rating' => 5,
                'description' => 'Premium brown hazelnuts',
            ],
            [
                'name' => 'Eggs',
                'category' => 'Fresh',
                'image' => 'Photo-removebg-preview.png',
                'original_price' => 20.00,
                'sale_price' => 17.00,
                'rating' => 5,
                'description' => 'Fresh farm eggs',
            ],
            [
                'name' => 'Zelco Suji Elaichi Rusk',
                'category' => 'Fresh',
                'image' => 'Photo__1_-removebg-preview.png',
                'original_price' => 20.00,
                'sale_price' => 15.00,
                'rating' => 5,
                'description' => 'Delicious elaichi flavored rusk',
            ],
            [
                'name' => 'White Hazelnut',
                'category' => 'Nuts',
                'image' => 'five-img-two.png',
                'original_price' => 20.00,
                'sale_price' => 12.00,
                'rating' => 5,
                'description' => 'Premium white hazelnuts',
            ],
            [
                'name' => 'Fresh Corn',
                'category' => 'Fresh',
                'image' => 'five-img-three.png',
                'original_price' => 20.00,
                'sale_price' => 17.00,
                'rating' => 5,
                'description' => 'Sweet fresh corn',
            ],
            [
                'name' => 'Organic Almonds',
                'category' => 'Fresh',
                'image' => 'five-img-four.png',
                'original_price' => 20.00,
                'sale_price' => 15.00,
                'rating' => 5,
                'description' => 'Organic California almonds',
            ],
            [
                'name' => 'Calabrese Broccoli',
                'category' => 'Vegetable',
                'image' => 'card-7.png',
                'original_price' => 20.00,
                'sale_price' => 13.00,
                'rating' => 5,
                'description' => 'Fresh calabrese broccoli',
            ],
            [
                'name' => 'Fresh Banana Fruites',
                'category' => 'Fresh',
                'image' => 'card-6.png',
                'original_price' => 20.00,
                'sale_price' => 14.00,
                'rating' => 5,
                'description' => 'Fresh ripe bananas',
            ],
            [
                'name' => 'White Nuts',
                'category' => 'Millets',
                'image' => 'card-5.png',
                'original_price' => 20.00,
                'sale_price' => 15.00,
                'rating' => 5,
                'description' => 'Premium white nuts',
            ],
            [
                'name' => 'Vegan Red Tomato',
                'category' => 'Vegetable',
                'image' => 'card-4.png',
                'original_price' => 20.00,
                'sale_price' => 17.00,
                'rating' => 5,
                'description' => 'Fresh organic red tomatoes',
            ],
        ];

        foreach ($products as $product) {
            $product['slug'] = Str::slug($product['name']);
            Product::create($product);
        }
    }
}
