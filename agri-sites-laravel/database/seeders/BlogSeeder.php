<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = [
            [
                'title' => 'The Benefits of Vitamin D & How to Get It',
                'author' => 'Rachi Card',
                'category' => 'Health & Nutrition',
                'image' => 'card-6.png',
                'excerpt' => 'Discover the essential benefits of Vitamin D and how you can incorporate more of it into your daily diet through natural sources.',
                'content' => '<h2>Understanding Vitamin D</h2>
<p>Vitamin D is a fat-soluble vitamin that is produced by your body when exposed to sunlight. It\'s also called the "sunshine vitamin" because of its association with sun exposure. Vitamin D is essential for maintaining healthy bones, teeth, and muscles.</p>

<h3>Key Benefits of Vitamin D</h3>
<ul>
<li><strong>Bone Health:</strong> Vitamin D helps your body absorb calcium, which is essential for strong bones and teeth. Without sufficient vitamin D, your body cannot maintain adequate calcium levels, leading to fragile bones.</li>
<li><strong>Immune Function:</strong> Vitamin D plays a crucial role in maintaining a healthy immune system. It helps your body fight off infections and reduce inflammation.</li>
<li><strong>Mood Regulation:</strong> Studies show that vitamin D deficiency is linked to depression and seasonal affective disorder. Getting enough vitamin D can help improve your mood and mental health.</li>
<li><strong>Muscle Function:</strong> Vitamin D is important for muscle strength and function. It helps regulate calcium and phosphate levels needed for muscle contraction.</li>
<li><strong>Heart Health:</strong> Emerging research suggests that vitamin D may help reduce the risk of heart disease and regulate blood pressure.</li>
</ul>

<h3>Natural Sources of Vitamin D</h3>
<p>While sunlight is the primary source of vitamin D, you can also get it from various foods:</p>
<ul>
<li>Fatty fish (salmon, mackerel, sardines)</li>
<li>Egg yolks</li>
<li>Mushrooms exposed to sunlight</li>
<li>Fortified dairy products</li>
<li>Organic vegetables from our farm</li>
</ul>

<h3>How Much Vitamin D Do You Need?</h3>
<p>The recommended daily intake of vitamin D is:</p>
<ul>
<li>Infants (0-12 months): 400-1000 IU</li>
<li>Children (1-18 years): 600-1000 IU</li>
<li>Adults (19-70 years): 600-800 IU</li>
<li>Adults over 70: 800 IU</li>
</ul>

<h3>Tips to Boost Your Vitamin D Levels</h3>
<ol>
<li>Get 10-30 minutes of midday sun exposure several times per week</li>
<li>Eat fatty fish 2-3 times per week</li>
<li>Include mushrooms in your diet</li>
<li>Consume fortified dairy products or plant-based alternatives</li>
<li>Consider a vitamin D supplement if recommended by your doctor</li>
<li>Shop organic vegetables at our farm for maximum nutrients</li>
</ol>

<p>Remember, balance is key. Too much vitamin D can be harmful, so it\'s important to get the right amount for your individual needs.</p>',
            ],
            [
                'title' => 'Our Favourite Summertime Tomatoes',
                'author' => 'Rachi Card',
                'category' => 'Farm Produce',
                'image' => 'card-4.png',
                'excerpt' => 'Explore why summer tomatoes are everyone\'s favorite and how to select, store, and prepare them perfectly.',
                'content' => '<h2>The Perfect Summer Tomato</h2>
<p>There\'s nothing quite like a fresh, ripe tomato picked straight from the farm during summer. The warm weather brings out the sweetness and depth of flavor in tomatoes that you simply can\'t find during other seasons.</p>

<h3>Why Summer Tomatoes Are Special</h3>
<p>Summer tomatoes are grown in warm, sunny conditions that allow them to develop full flavor and sweetness. Unlike tomatoes that are shipped long distances, our locally-grown summer tomatoes are picked at peak ripeness and reach your table within days.</p>

<h3>Varieties to Look For</h3>
<ul>
<li><strong>Heirloom Tomatoes:</strong> These come in unique shapes and colors with exceptional flavor. Popular varieties include Brandywine, Cherokee Purple, and Mortgage Lifter.</li>
<li><strong>Beefsteak Tomatoes:</strong> Large, meaty tomatoes perfect for slicing and serving with fresh mozzarella and basil.</li>
<li><strong>Cherry Tomatoes:</strong> Sweet and small, perfect for snacking or adding to salads.</li>
<li><strong>Roma Tomatoes:</strong> Excellent for cooking, sauce-making, and canning.</li>
<li><strong>Yellow Tomatoes:</strong> Sweeter than red varieties with a mild flavor.</li>
</ul>

<h3>How to Select the Perfect Tomato</h3>
<p>When shopping for tomatoes at your local farmer\'s market or our farm stand, look for:</p>
<ul>
<li>Rich color appropriate for the variety</li>
<li>Slight give when gently squeezed (not rock-hard)</li>
<li>Fragrant aroma near the stem</li>
<li>Blemish-free skin (minor imperfections are fine and normal)</li>
<li>Heavier weight for its size</li>
</ul>

<h3>Storage Tips</h3>
<p>The key to maintaining tomato flavor is proper storage:</p>
<ul>
<li>Store at room temperature, never in the refrigerator</li>
<li>Keep away from direct sunlight</li>
<li>Arrange stem-side down in a single layer</li>
<li>Use within a week of purchase for best flavor</li>
<li>If you must refrigerate, bring them to room temperature before eating</li>
</ul>

<h3>Delicious Ways to Use Summer Tomatoes</h3>
<ol>
<li><strong>Caprese Salad:</strong> Layer ripe tomatoes with fresh mozzarella, basil, and olive oil</li>
<li><strong>Tomato Soup:</strong> Make a creamy or broth-based soup with fresh tomatoes</li>
<li><strong>Salsa:</strong> Blend fresh tomatoes with onions, cilantro, and lime juice</li>
<li><strong>Gazpacho:</strong> A refreshing cold soup perfect for hot summer days</li>
<li><strong>Pasta Sauce:</strong> Create a simple, fresh marinara sauce</li>
<li><strong>Grilling:</strong> Grill thick tomato slices for a unique side dish</li>
</ol>

<h3>Nutritional Benefits</h3>
<p>Summer tomatoes are packed with:</p>
<ul>
<li>Lycopene (a powerful antioxidant)</li>
<li>Vitamin C (boosts immunity)</li>
<li>Potassium (supports heart health)</li>
<li>Folate (important for cell division)</li>
<li>Low in calories but high in nutrients</li>
</ul>

<p>Don\'t miss out on the season\'s best produce. Visit our farm stand or local market to pick up the freshest, most delicious tomatoes available. Your taste buds will thank you!</p>',
            ],
            [
                'title' => 'Organic Farming: Sustainable Methods for Better Health',
                'author' => 'Farm Manager',
                'category' => 'Sustainable Agriculture',
                'image' => 'card-7.png',
                'excerpt' => 'Learn about our organic farming practices and how they contribute to better health and environmental sustainability.',
                'content' => '<h2>What is Organic Farming?</h2>
<p>Organic farming is an agricultural system that avoids the use of synthetic pesticides, fertilizers, and genetically modified organisms (GMOs). Instead, it relies on natural methods to maintain soil health, control pests, and grow nutritious crops.</p>

<h3>Core Principles of Organic Farming</h3>
<ul>
<li><strong>Soil Health:</strong> Building and maintaining fertile soil through composting and crop rotation</li>
<li><strong>Biodiversity:</strong> Encouraging diverse plant and animal species on the farm</li>
<li><strong>Natural Pest Control:</strong> Using beneficial insects and companion planting instead of chemicals</li>
<li><strong>Water Conservation:</strong> Implementing efficient irrigation and water management practices</li>
<li><strong>No Synthetic Chemicals:</strong> Eliminating pesticides, herbicides, and artificial fertilizers</li>
</ul>

<h3>Our Sustainable Practices</h3>
<p>At our farm, we implement several sustainable methods:</p>

<h4>Crop Rotation</h4>
<p>We rotate crops each season to prevent soil depletion and reduce pest buildup. This ancient practice helps maintain soil fertility naturally.</p>

<h4>Composting</h4>
<p>All farm and kitchen waste is composted to create nutrient-rich soil amendments that improve soil structure and health.</p>

<h4>Integrated Pest Management</h4>
<p>Rather than using chemical pesticides, we encourage natural predators, use row covers, and plant companion plants that help control pests.</p>

<h4>Water Management</h4>
<p>We use drip irrigation, mulching, and rainwater harvesting to minimize water usage while maintaining crop health.</p>

<h4>Soil Testing</h4>
<p>Regular soil testing helps us understand nutrient levels and adjust our practices accordingly without synthetic chemicals.</p>

<h3>Health Benefits of Organic Produce</h3>
<p>Choosing organic has numerous health benefits:</p>
<ul>
<li>Higher nutrient density compared to conventionally grown produce</li>
<li>Reduced pesticide residue exposure</li>
<li>No artificial additives or preservatives</li>
<li>Better for those with chemical sensitivities</li>
<li>Support for local farming communities</li>
</ul>

<h3>Environmental Benefits</h3>
<ul>
<li>Improved soil health and structure</li>
<li>Reduced water pollution from chemical runoff</li>
<li>Lower carbon footprint from reduced chemical production</li>
<li>Enhanced biodiversity on farms</li>
<li>Preservation of natural ecosystems</li>
</ul>

<h3>The Economics of Organic Farming</h3>
<p>While organic produce may cost slightly more, consider:</p>
<ul>
<li>Lower pesticide residues mean less health risk</li>
<li>Supporting local farmers and sustainable practices</li>
<li>Investment in long-term environmental health</li>
<li>Better taste and nutritional quality</li>
<li>Reduced healthcare costs from better nutrition</li>
</ul>

<h3>Getting Started with Organic</h3>
<p>If you\'re interested in transitioning to organic:</p>
<ol>
<li>Start with the "Dirty Dozen" - the 12 produce items with the most pesticide residue</li>
<li>Shop at local farmer\'s markets for fresher, more affordable organic options</li>
<li>Join a CSA (Community Supported Agriculture) program</li>
<li>Grow your own vegetables if you have space</li>
<li>Read labels and look for organic certification</li>
</ol>

<p>Choosing organic is an investment in your health and the health of our planet. Join us in supporting sustainable agriculture!</p>',
            ],
            [
                'title' => 'Top 10 Ways to Reduce Food Waste at Home',
                'author' => 'Sustainability Expert',
                'category' => 'Tips & Tricks',
                'image' => 'card-8.png',
                'excerpt' => 'Practical tips and strategies to minimize food waste and make the most of your groceries.',
                'content' => '<h2>Why Food Waste Matters</h2>
<p>Food waste is a significant global problem. In developed countries, substantial amounts of food are wasted at the consumer level. Not only does this waste money, but it also wastes the resources used to grow, transport, and store the food. Learning to reduce food waste is good for your wallet and the environment.</p>

<h3>10 Practical Ways to Reduce Food Waste</h3>

<h4>1. Plan Your Meals</h4>
<p>Take time each week to plan your meals. Create a grocery list based on what you\'ll actually prepare and consume. This prevents buying excess food that goes bad.</p>

<h4>2. Shop Your Pantry First</h4>
<p>Before buying groceries, check what you already have at home. Use ingredients you already own before purchasing new ones.</p>

<h4>3. Master Proper Storage</h4>
<p>Learn the best way to store different foods:</p>
<ul>
<li>Root vegetables in a cool, dark place</li>
<li>Leafy greens wrapped in paper towels</li>
<li>Berries in breathable containers</li>
<li>Herbs standing upright in water like flowers</li>
</ul>

<h4>4. Understand Expiration Dates</h4>
<p>"Use by" dates are for safety, but "best before" dates are about quality. Many foods are perfectly safe to use past the "best before" date.</p>

<h4>5. Love Your Freezer</h4>
<p>Freeze vegetables, fruit, bread, and prepared meals before they go bad. Frozen food lasts months and is just as nutritious.</p>

<h4>6. Make a "Use First" Shelf</h4>
<p>Keep a designated shelf for items that need to be used soon. Check it daily when deciding what to eat.</p>

<h4>7. Practice First In, First Out</h4>
<p>When stocking your fridge, push older items to the front so they get used first.</p>

<h4>8. Get Creative with Leftovers</h4>
<p>Transform leftover vegetables into soups, stir-fries, or smoothies. Stale bread becomes croutons or bread pudding.</p>

<h4>9. Compost Scraps</h4>
<p>If you can\'t use something, at least compost it instead of throwing it away. It\'ll become nutrient-rich soil.</p>

<h4>10. Share and Donate</h4>
<p>If you have extra food, share it with neighbors or donate to local food banks. Many people need food assistance.</p>

<h3>Easy Recipes to Use Up Produce</h3>
<ul>
<li>Vegetable soup (use any vegetables)</li>
<li>Stir-fry (perfect for various veggies)</li>
<li>Frittata (great way to use eggs and vegetables)</li>
<li>Smoothie (use aging fruit)</li>
<li>Pickle or ferment (extends life of vegetables)</li>
</ul>

<h3>The Bottom Line</h3>
<p>Reducing food waste is easier than you think. With a little planning and creativity, you can save money, reduce environmental impact, and eat better. Start with one or two tips and gradually incorporate more into your routine. Every bit helps!</p>',
            ],
        ];

        foreach ($blogs as $blog) {
            $slug = Str::slug($blog['title']);
            $blog['slug'] = $slug;
            Blog::updateOrCreate(
                ['slug' => $slug],
                $blog
            );
        }
    }
}
