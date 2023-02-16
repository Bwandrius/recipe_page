<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $categories = DB::table('categories')->pluck('id')->toArray();

        foreach(range(1, 60) as $index) {
            DB::table('recipes')->insert([
                'name' => $faker->unique()->words($nb = 3, $asText = true),
                'category_id' => $faker->randomElement($categories),
                'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'is_active' => true
            ]);
        }
    }
}
