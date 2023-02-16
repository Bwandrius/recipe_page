<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ingredients = [
            'Flour',
            'Sugar',
            'Salt',
            'Pepper',
            'Olive Oil',
            'Butter',
            'Eggs',
            'Milk',
            'Cheese',
            'Tomatoes',
            'Lettuce',
            'Onions',
            'Garlic',
            'Basil',
            'Parsley',
            'Cilantro',
            'Thyme',
            'Rosemary',
            'Chives',
            'Green Beans',
            'Carrots',
            'Potatoes',
            'Broccoli',
            'Cauliflower',
            'Spinach',
            'Kale',
            'Brussels Sprouts',
            'Lemons',
            'Oranges',
            'Grapes',
            'Apples',
            'Bananas',
            'Strawberries',
            'Raspberries',
            'Blueberries',
            'Blackberries',
            'Pineapple',
            'Mango',
            'Avocado',
            'Chicken',
            'Beef',
            'Pork',
            'Salmon',
            'Tuna',
            'Shrimp',
            'Crab',
            'Lobster',
            'Clams',
            'Oysters',
            'Scallops'
        ];

        foreach ($ingredients as $ingredient) {
            DB::table('ingredients')->insert([
                'name' => $ingredient,
                'is_active' => true
            ]);
        }
    }
}
