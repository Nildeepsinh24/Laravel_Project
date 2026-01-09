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
                'description' => 'Fresh organic mung beans grown without any harmful pesticides or chemicals.',
                'additional_info' => '<strong>Package Weight:</strong> 1kg<br><strong>Storage:</strong> Keep in a cool, dry place<br><strong>Shelf Life:</strong> 12 months<br><strong>Origin:</strong> India<br><strong>Certifications:</strong> 100% Organic, Non-GMO<br><strong>Nutritional Facts (per 100g):</strong> Protein 24g, Fiber 16g, Carbs 63g<br><strong>Usage:</strong> Perfect for soups, curries, and sprouting<br><strong>Preparation:</strong> Soak for 6-8 hours before cooking',
            ],
            [
                'name' => 'Brown Hazelnut',
                'category' => 'Nuts',
                'image' => 'Photo__2_-removebg-preview.png',
                'original_price' => 20.00,
                'sale_price' => 12.00,
                'rating' => 5,
                'description' => 'Premium brown hazelnuts sourced from the finest orchards.',
                'additional_info' => '<strong>Package Weight:</strong> 500g<br><strong>Storage:</strong> Store in airtight container in cool place<br><strong>Shelf Life:</strong> 8 months<br><strong>Origin:</strong> Turkey<br><strong>Variety:</strong> Pontika Grade<br><strong>Nutritional Facts (per 100g):</strong> Protein 14.9g, Fat 60.7g, Fiber 9.7g<br><strong>Health Benefits:</strong> Rich in antioxidants and healthy fats<br><strong>Quality:</strong> Blanched and roasted for best flavor',
            ],
            [
                'name' => 'Eggs',
                'category' => 'Fresh',
                'image' => 'Photo-removebg-preview.png',
                'original_price' => 20.00,
                'sale_price' => 17.00,
                'rating' => 5,
                'description' => 'Fresh farm eggs from free-range chickens with no antibiotics or hormones.',
                'additional_info' => '<strong>Quantity:</strong> 12 eggs per box<br><strong>Size:</strong> Large<br><strong>Storage:</strong> Refrigerate at 2-4°C<br><strong>Shelf Life:</strong> 4 weeks<br><strong>Origin:</strong> Local Farms<br><strong>Type:</strong> Free-range, Organic<br><strong>Nutritional Facts (per 100g):</strong> Protein 13g, Fat 11g, Cholesterol 372mg<br><strong>Quality Assurance:</strong> No antibiotics, hormones, or additives',
            ],
            [
                'name' => 'Zelco Suji Elaichi Rusk',
                'category' => 'Fresh',
                'image' => 'Photo__1_-removebg-preview.png',
                'original_price' => 20.00,
                'sale_price' => 15.00,
                'rating' => 5,
                'description' => 'Delicious elaichi (cardamom) flavored rusk made with finest ingredients.',
                'additional_info' => '<strong>Package Weight:</strong> 200g<br><strong>Storage:</strong> Keep in cool, dry place in airtight container<br><strong>Shelf Life:</strong> 6 months<br><strong>Origin:</strong> India<br><strong>Flavor:</strong> Elaichi (Cardamom)<br><strong>Nutritional Facts (per 100g):</strong> Energy 370 kcal, Protein 7g, Fat 8g, Carbs 65g<br><strong>Ingredients:</strong> Wheat flour, sugar, ghee, elaichi, salt<br><strong>Perfect For:</strong> Tea time snack, breakfast with milk',
            ],
            [
                'name' => 'White Hazelnut',
                'category' => 'Nuts',
                'image' => 'five-img-two.png',
                'original_price' => 20.00,
                'sale_price' => 12.00,
                'rating' => 5,
                'description' => 'Premium white hazelnuts rich in nutrients and antioxidants.',
                'additional_info' => '<strong>Package Weight:</strong> 500g<br><strong>Storage:</strong> Store in airtight container<br><strong>Shelf Life:</strong> 8 months<br><strong>Origin:</strong> Turkey<br><strong>Processing:</strong> Blanched, skinless<br><strong>Nutritional Facts (per 100g):</strong> Protein 12g, Fat 63g, Fiber 10g<br><strong>Health Benefits:</strong> Excellent source of vitamin E and minerals<br><strong>Uses:</strong> Snacking, baking, chocolate production',
            ],
            [
                'name' => 'Fresh Corn',
                'category' => 'Fresh',
                'image' => 'five-img-three.png',
                'original_price' => 20.00,
                'sale_price' => 17.00,
                'rating' => 5,
                'description' => 'Sweet and juicy fresh corn harvested at peak ripeness.',
                'additional_info' => '<strong>Package Weight:</strong> 1kg (4-5 ears)<br><strong>Storage:</strong> Refrigerate in plastic bag<br><strong>Shelf Life:</strong> 5-7 days<br><strong>Origin:</strong> Local Farms<br><strong>Harvested:</strong> Peak Ripeness<br><strong>Nutritional Facts (per 100g):</strong> Energy 86 kcal, Protein 3.3g, Carbs 19g, Fiber 2.7g<br><strong>Quality:</strong> Fresh picked within 24 hours<br><strong>Best Use:</strong> Grilling, boiling, or roasting',
            ],
            [
                'name' => 'Organic Almonds',
                'category' => 'Fresh',
                'image' => 'five-img-four.png',
                'original_price' => 20.00,
                'sale_price' => 15.00,
                'rating' => 5,
                'description' => 'Organic California almonds grown using sustainable farming practices.',
                'additional_info' => '<strong>Package Weight:</strong> 500g<br><strong>Storage:</strong> Keep in airtight container in cool place<br><strong>Shelf Life:</strong> 10 months<br><strong>Origin:</strong> California, USA<br><strong>Certification:</strong> USDA Organic<br><strong>Nutritional Facts (per 100g):</strong> Protein 21.2g, Fat 49.9g, Fiber 12.5g<br><strong>Health Benefits:</strong> Rich in vitamin E, calcium, and magnesium<br><strong>Uses:</strong> Raw snacking, baking, almond butter',
            ],
            [
                'name' => 'Calabrese Broccoli',
                'category' => 'Vegetable',
                'image' => 'card-7.png',
                'original_price' => 20.00,
                'sale_price' => 13.00,
                'rating' => 5,
                'description' => 'Fresh calabrese broccoli rich in vitamins and minerals.',
                'additional_info' => '<strong>Package Weight:</strong> 500g<br><strong>Storage:</strong> Refrigerate in plastic bag<br><strong>Shelf Life:</strong> 5-7 days<br><strong>Origin:</strong> Local Farms<br><strong>Type:</strong> Calabrese (Italian Green)<br><strong>Nutritional Facts (per 100g):</strong> Energy 34 kcal, Protein 2.8g, Carbs 7g, Fiber 2.4g<br><strong>Key Nutrients:</strong> Vitamin C, K, Folate<br><strong>Preparation:</strong> Steam, boil, or roast for 8-10 minutes',
            ],
            [
                'name' => 'Fresh Banana Fruites',
                'category' => 'Fresh',
                'image' => 'card-6.png',
                'original_price' => 20.00,
                'sale_price' => 14.00,
                'rating' => 5,
                'description' => 'Fresh ripe bananas with natural sweetness and great nutrition.',
                'additional_info' => '<strong>Quantity:</strong> 1kg (6-7 bananas)<br><strong>Storage:</strong> Room temperature, away from direct sunlight<br><strong>Shelf Life:</strong> 5-7 days<br><strong>Origin:</strong> Tropical Regions<br><strong>Ripeness:</strong> Perfectly ripe and sweet<br><strong>Nutritional Facts (per 100g):</strong> Energy 89 kcal, Protein 1.1g, Carbs 23g, Potassium 358mg<br><strong>Health Benefits:</strong> Great source of potassium and vitamin B6<br><strong>Best For:</strong> Fresh eating, smoothies, baking',
            ],
            [
                'name' => 'White Nuts',
                'category' => 'Millets',
                'image' => 'card-5.png',
                'original_price' => 20.00,
                'sale_price' => 15.00,
                'rating' => 5,
                'description' => 'Premium white nuts packed with essential nutrients.',
                'additional_info' => '<strong>Package Weight:</strong> 500g<br><strong>Storage:</strong> Store in airtight container<br><strong>Shelf Life:</strong> 8 months<br><strong>Origin:</strong> India<br><strong>Quality:</strong> Hand-selected premium grade<br><strong>Nutritional Facts (per 100g):</strong> Protein 20g, Fat 68g, Fiber 8g<br><strong>Key Minerals:</strong> Magnesium, zinc, iron<br><strong>Health Benefits:</strong> Supports heart health and energy levels',
            ],
            [
                'name' => 'Vegan Red Tomato',
                'category' => 'Vegetable',
                'image' => 'card-4.png',
                'original_price' => 20.00,
                'sale_price' => 17.00,
                'rating' => 5,
                'description' => 'Fresh organic red tomatoes with intense flavor and bright color.',
                'additional_info' => '<strong>Package Weight:</strong> 1kg (5-6 tomatoes)<br><strong>Storage:</strong> Room temperature, stem side down<br><strong>Shelf Life:</strong> 7-10 days<br><strong>Origin:</strong> Local Farms<br><strong>Type:</strong> Heirloom Red Tomato<br><strong>Nutritional Facts (per 100g):</strong> Energy 18 kcal, Protein 0.9g, Carbs 3.9g, Fiber 1.2g<br><strong>Key Nutrients:</strong> Lycopene, Vitamin C<br><strong>Best Use:</strong> Salads, cooking, sauces, fresh consumption',
            ],
        ];

        foreach ($products as $product) {
            $product['slug'] = Str::slug($product['name']);
            Product::create($product);
        }
    }
}
