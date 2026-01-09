<?php

namespace Database\Seeders;

use App\Models\PortfolioItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title' => 'Green & Tasty Lemon',
                'category' => 'Fruits',
                'image' => 'lemonbg-one-1.png',
                'excerpt' => 'Fresh organic lemons grown sustainably.',
                'description' => '<p>Our lemons are grown on small family farms using sustainable practices. They are packed with vitamin C and perfect for drinks, desserts, and everyday cooking.</p>',
                'client' => 'Nature Foods Co.',
                'service' => 'Organic Farming',
            ],
            [
                'title' => 'Organic Carrot',
                'category' => 'Farmer',
                'image' => 'crop-img-one.png',
                'excerpt' => 'Crunchy carrots rich in beta-carotene.',
                'description' => '<p>Sweet and crisp, our carrots add color and nutrition to salads, soups, and roasts. No synthetic fertilizers or pesticides used.</p>',
                'client' => 'Green Valley',
                'service' => 'Harvest & Supply',
            ],
            [
                'title' => 'Organic Betel Leaf',
                'category' => 'Leaf',
                'image' => 'crop-img-two.png',
                'excerpt' => 'Handpicked aromatic leaves.',
                'description' => '<p>Carefully handpicked betel leaves known for their aroma and cultural significance. Grown using natural, eco-friendly methods.</p>',
                'client' => 'Leaf & Herb Co.',
                'service' => 'Herbal Produce',
            ],
            [
                'title' => 'Natural Tomato',
                'category' => 'Fruits',
                'image' => 'totmaors-img-portfoliyto.png',
                'excerpt' => 'Vine-ripened, juicy tomatoes.',
                'description' => '<p>Juicy tomatoes ripened on the vine for peak flavor. Ideal for sauces, salads, and sandwiches.</p>',
                'client' => 'Sun Farm',
                'service' => 'Seasonal Produce',
            ],
            [
                'title' => 'Black Raspberry',
                'category' => 'Farmer',
                'image' => 'five-fiveth-img.png',
                'excerpt' => 'Deep flavor, rich antioxidants.',
                'description' => '<p>Rich, dark berries bursting with flavor and antioxidants. Excellent for desserts or healthy snacking.</p>',
                'client' => 'Berry Fields',
                'service' => 'Organic Products',
            ],
            [
                'title' => 'Honey Orange',
                'category' => 'Farmer',
                'image' => 'honer-orenge-six.png',
                'excerpt' => 'Sweet citrus with floral notes.',
                'description' => '<p>Fragrant oranges with a natural sweetness. Great for fresh juice and zesting.</p>',
                'client' => 'Citrus Grove',
                'service' => 'Citrus Harvest',
            ],
        ];

        foreach ($items as $data) {
            PortfolioItem::updateOrCreate(
                ['slug' => Str::slug($data['title'])],
                array_merge($data, [
                    'slug' => Str::slug($data['title']),
                    'published_at' => now(),
                ])
            );
        }
    }
}
