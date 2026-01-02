<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cake;

class CakeSeeder extends Seeder
{
    public function run()
    {
        $cakes = [

            // -------------------- REGULAR CAKES --------------------
            [
                'name' => 'Vanilla Dream',
                'category' => 'regular',
                'price' => 1800,
                'image' => 'images/vanilla.jpg',
                'description' => 'Classic vanilla sponge with buttercream.',
                'ingredients' => 'Flour, Sugar, Eggs, Vanilla Essence'
            ],
            [
                'name' => 'Chocolate Bliss',
                'category' => 'regular',
                'price' => 2000,
                'image' => 'images/cake1.jpg',
                'description' => 'Rich chocolate layers with silky ganache.',
                'ingredients' => 'Chocolate, Flour, Sugar, Eggs'
            ],
            [
                'name' => 'Strawberry Heaven',
                'category' => 'regular',
                'price' => 2200,
                'image' => 'images/strawberry.jpg',
                'description' => 'Soft vanilla cake topped with strawberries.',
                'ingredients' => 'Strawberry, Cream, Vanilla, Flour'
            ],
            [
                'name' => 'Lemon Zest',
                'category' => 'regular',
                'price' => 1900,
                'image' => 'images/lemon.jpeg',
                'description' => 'Tangy lemon sponge with creamy frosting.',
                'ingredients' => 'Lemon, Flour, Sugar, Eggs'
            ],
            [
                'name' => 'Coffee Delight',
                'category' => 'regular',
                'price' => 2100,
                'image' => 'images/cofeedelight.jpeg',
                'description' => 'Espresso-infused cake with mocha layers.',
                'ingredients' => 'Coffee, Flour, Cream, Cocoa'
            ],
            [
                'name' => 'Red Velvet Love',
                'category' => 'regular',
                'price' => 2300,
                'image' => 'images/red velvet.jpeg',
                'description' => 'Moist red velvet with cream cheese frosting.',
                'ingredients' => 'Cocoa, Vinegar, Buttermilk, Flour'
            ],
            [
                'name' => 'Caramel Crunch',
                'category' => 'regular',
                'price' => 2400,
                'image' => 'images/caramel.jpeg',
                'description' => 'Rich caramel sponge topped with praline.',
                'ingredients' => 'Caramel, Cream, Sugar, Flour'
            ],
            [
                'name' => 'Pineapple Paradise',
                'category' => 'regular',
                'price' => 2000,
                'image' => 'images/pineapple.jpeg',
                'description' => 'Light and fruity pineapple-flavored cake.',
                'ingredients' => 'Pineapple, Cream, Vanilla, Sugar'
            ],

            // -------------------- CUSTOMIZED CAKES --------------------
            [
                'name' => 'Rainbow Fantasy',
                'category' => 'customized',
                'price' => 2500,
                'image' => 'images/rainbow.jpeg',
                'description' => 'Colorful layered cake for celebrations.',
                'ingredients' => 'Butter, Eggs, Sugar, Food Colors'
            ],
            [
                'name' => 'Unicorn Magic',
                'category' => 'customized',
                'price' => 2800,
                'image' => 'images/unicorn.jpeg',
                'description' => 'Whimsical unicorn cake with pastel frosting.',
                'ingredients' => 'Cream, Fondant, Sugar, Food Colors'
            ],
            [
                'name' => 'Photo Cake',
                'category' => 'customized',
                'price' => 2700,
                'image' => 'images/photo.jpeg',
                'description' => 'Add your photo on top — personalized delight.',
                'ingredients' => 'Fondant, Cream, Edible Ink'
            ],
            [
                'name' => 'Cartoon Fun Cake',
                'category' => 'customized',
                'price' => 2600,
                'image' => 'images/cartoon.jpeg',
                'description' => 'Kids’ favorite cartoon-themed cake.',
                'ingredients' => 'Fondant, Cream, Food Colors'
            ],
            [
                'name' => 'Marble Magic',
                'category' => 'customized',
                'price' => 2500,
                'image' => 'images/marble.jpeg',
                'description' => 'Beautiful marble swirl cake.',
                'ingredients' => 'Chocolate, Vanilla, Butter, Sugar'
            ],
            [
                'name' => 'Galaxy Swirl',
                'category' => 'customized',
                'price' => 2900,
                'image' => 'images/galaxy.jpeg',
                'description' => 'Shiny galaxy effect cake.',
                'ingredients' => 'Fondant, Glitter, Food Colors'
            ],
            [
                'name' => 'Rose Gold Elegance',
                'category' => 'customized',
                'price' => 3100,
                'image' => 'images/rose.jpeg',
                'description' => 'Rose-gold shimmer themed cake.',
                'ingredients' => 'Fondant, Edible Glitter, Cream'
            ],
            [
                'name' => 'Game Controller Cake',
                'category' => 'customized',
                'price' => 3000,
                'image' => 'images/game.jpeg',
                'description' => 'Perfect for gamers.',
                'ingredients' => 'Fondant, Chocolate, Buttercream'
            ],

            // -------------------- WEDDING CAKES --------------------
            [
                'name' => 'Royal White',
                'category' => 'wedding',
                'price' => 4000,
                'image' => 'images/wedding1.jpeg',
                'description' => 'Elegant white fondant wedding cake.',
                'ingredients' => 'Fondant, Vanilla, Sugar, Cream'
            ],
            [
                'name' => 'Golden Bliss',
                'category' => 'wedding',
                'price' => 4500,
                'image' => 'images/wedding2.jpeg',
                'description' => 'Luxurious gold-accented wedding tier.',
                'ingredients' => 'Vanilla, Fondant, Gold Dust, Cream'
            ],
            [
                'name' => 'Floral Fantasy',
                'category' => 'wedding',
                'price' => 4200,
                'image' => 'images/wedding3.jpeg',
                'description' => 'Decorated with fresh edible flowers.',
                'ingredients' => 'Vanilla, Cream, Edible Flowers'
            ],
            [
                'name' => 'Pearl Perfection',
                'category' => 'wedding',
                'price' => 4300,
                'image' => 'images/wedding4.jpeg',
                'description' => 'White pearls and soft frosting.',
                'ingredients' => 'Fondant, Sugar, Cream, Pearls'
            ],
            [
                'name' => 'Romantic Red Roses',
                'category' => 'wedding',
                'price' => 4400,
                'image' => 'images/wedding5.jpeg',
                'description' => 'Red rose themed wedding cake.',
                'ingredients' => 'Fondant, Rose Cream, Vanilla'
            ],
            [
                'name' => 'Royal Gold Leaf',
                'category' => 'wedding',
                'price' => 4700,
                'image' => 'images/wedding6.jpeg',
                'description' => 'Decorated with real edible gold leaves.',
                'ingredients' => 'Gold Leaf, Cream, Vanilla'
            ],
            [
                'name' => 'Pastel Garden',
                'category' => 'wedding',
                'price' => 4100,
                'image' => 'images/wedding7.jpeg',
                'description' => 'Soft pastel tones for spring weddings.',
                'ingredients' => 'Fondant, Cream, Food Colors'
            ],

        ];

        foreach ($cakes as $cake) {
            Cake::create($cake);
        }
    }
}
