<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('food_categories')->insert([
           ['id' => 1, 'description' => 'Vegan'],
           ['id' => 2, 'description' => 'Vegetarian'],
        ]);
    }
}
