<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Appetizers',
            'Breads',
            'Breakfast',
            'Desserts',
            'Drinks',
            'Fish and Seafood',
            'Meat',
            'Pasta',
            'Poultry',
            'Salads',
            'Sauces and Condiments',
            'Side Dishes',
            'Snacks',
            'Soups and Stews',
            'Vegetables',
            'Vegan',
            'Gluten-free',
            'Low Carb',
            'Paleo',
            'Keto'
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'is_active' => true
            ]);
        }
    }
}
