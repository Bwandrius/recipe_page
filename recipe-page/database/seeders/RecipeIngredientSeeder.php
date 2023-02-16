<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class RecipeIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $recipes = DB::table('recipes')->pluck('id')->toArray();
        $ingredients = DB::table('ingredients')->pluck('id')->toArray();

        foreach($recipes as $recipe_id) {
            $ingredient_ids = $faker->randomElements($ingredients, $faker->numberBetween(2, 7));
            foreach($ingredient_ids as $ingredient_id) {
                DB::table('recipe_ingredients')->insert([
                    'recipe_id' => $recipe_id,
                    'ingredient_id' => $ingredient_id
                ]);
            }

        }
    }
}
