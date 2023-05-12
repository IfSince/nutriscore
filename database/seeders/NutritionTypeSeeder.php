<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NutritionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nutrition_types')->insert([
            ['id' => 1, 'description' => 'Normal', 'protein' => 15, 'carbohydrates' => 55, 'fats' => 30],
            ['id' => 2, 'description' => 'Ketogenic', 'protein' => 15, 'carbohydrates' => 5, 'fats' => 80],
            ['id' => 3, 'description' => 'Low carb', 'protein' => 30, 'carbohydrates' => 25, 'fats' => 45],
            ['id' => 4, 'description' => 'Low fat', 'protein' => 20, 'carbohydrates' => 70, 'fats' => 10],
            ['id' => 5, 'description' => 'High protein', 'protein' => 35, 'carbohydrates' => 35, 'fats' => 30],
            ['id' => 6, 'description' => 'High protein + high fat', 'protein' => 20, 'carbohydrates' => 15, 'fats' => 55],
            ['id' => 7, 'description' => 'D-A-C-H Reference', 'protein' => 10, 'carbohydrates' => 60, 'fats' => 30],
            ['id' => 8, 'description' => 'Custom', 'protein' => null, 'carbohydrates' => null, 'fats' => null],
        ]);
    }
}
