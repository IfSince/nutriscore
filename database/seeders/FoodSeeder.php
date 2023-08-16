<?php

namespace Database\Seeders;

use App\Models\Enums\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        DB::table('food')->insert([
            ['id' => 1, 'description' => 'Apple', 'unit' => Unit::GRAM, 'amount' => 100, 'calories' => 49, 'protein' => 0, 'carbohydrates' => 12, 'fats' => 0],
            ['id' => 2, 'description' => 'Pineapple', 'unit' => Unit::GRAM, 'amount' => 100, 'calories' => 29, 'protein' => 0, 'carbohydrates' => 7, 'fats' => 0.1],
            ['id' => 3, 'description' => 'Banana', 'unit' => Unit::GRAM, 'amount' => 100, 'calories' => 70, 'protein' => 1, 'carbohydrates' => 16, 'fats' => 0],
            ['id' => 4,'description' => 'Pear', 'unit' => Unit::GRAM, 'amount' => 100, 'calories' => 57, 'protein' => 1, 'carbohydrates' => 13, 'fats' => 0],
            ['id' => 5,'description' => 'Grapefruit', 'unit' => Unit::GRAM, 'amount' => 100, 'calories' => 33, 'protein' => 1, 'carbohydrates' => 7, 'fats' => 0],
            ['id' => 6,'description' => 'Kiwi', 'unit' => Unit::GRAM, 'amount' => 100, 'calories' => 53, 'protein' => 1, 'carbohydrates' => 12, 'fats' => 0],
            ['id' => 7,'description' => 'Mango', 'unit' => Unit::GRAM, 'amount' => 100, 'calories' => 49, 'protein' => 1, 'carbohydrates' => 11, 'fats' => 0],
            ['id' => 8,'description' => 'Lemon', 'unit' => Unit::GRAM, 'amount' => 100, 'calories' => 25, 'protein' => 1, 'carbohydrates' => 5, 'fats' => 0],
            ['id' => 9,'description' => 'Milk, Low fat 1.5%', 'unit' => Unit::GRAM, 'amount' => 100, 'calories' => 51, 'protein' => 4, 'carbohydrates' => 5, 'fats' => 1],
            ['id' => 10,'description' => 'Yogurt', 'unit' => Unit::GRAM, 'amount' => 100, 'calories' => 74, 'protein' => 5, 'carbohydrates' => 5, 'fats' => 3],
            ['id' => 11,'description' => 'Fried potatoes', 'unit' => Unit::GRAM, 'amount' => 100, 'calories' => 115, 'protein' => 2, 'carbohydrates' => 17, 'fats' => 4],
            ['id' => 12,'description' => 'French fries', 'unit' => Unit::GRAM, 'amount' => 100, 'calories' => 267, 'protein' => 4, 'carbohydrates' => 34, 'fats' => 12],
            ['id' => 13,'description' => 'Cashew nuts', 'unit' => Unit::GRAM, 'amount' => 100, 'calories' => 587, 'protein' => 18, 'carbohydrates' => 30, 'fats' => 42],
            ['id' => 14,'description' => 'Hazelnuts', 'unit' => Unit::GRAM, 'amount' => 100, 'calories' => 687, 'protein' => 14, 'carbohydrates' => 13, 'fats' => 62],
            ['id' => 15,'description' => 'Almonds', 'unit' => Unit::GRAM, 'amount' => 100, 'calories' => 642, 'protein' => 18, 'carbohydrates' => 16, 'fats' => 54],
            ['id' => 16,'description' => 'Crispbread', 'unit' => Unit::GRAM, 'amount' => 100, 'calories' => 317, 'protein' => 10, 'carbohydrates' => 65, 'fats' => 1],
            ['id' => 17,'description' => 'Pretzel', 'unit' => Unit::AMOUNT, 'amount' => 1, 'calories' => 125, 'protein' => 0, 'carbohydrates' => 0, 'fats' => 0],
        ]);

        DB::table('food_to_food_categories')->insert([
            ['food_id' => 1, 'food_category_id' => 1], ['food_id' => 1, 'food_category_id' => 2], ['food_id' => 1, 'food_category_id' => 6],
            ['food_id' => 2, 'food_category_id' => 1], ['food_id' => 2, 'food_category_id' => 2], ['food_id' => 2, 'food_category_id' => 6],
            ['food_id' => 3, 'food_category_id' => 1], ['food_id' => 3, 'food_category_id' => 2], ['food_id' => 3, 'food_category_id' => 6],
            ['food_id' => 4, 'food_category_id' => 1], ['food_id' => 4, 'food_category_id' => 2], ['food_id' => 4, 'food_category_id' => 6],
            ['food_id' => 5, 'food_category_id' => 1], ['food_id' => 5, 'food_category_id' => 2], ['food_id' => 5, 'food_category_id' => 6],
            ['food_id' => 6, 'food_category_id' => 1], ['food_id' => 6, 'food_category_id' => 2], ['food_id' => 6, 'food_category_id' => 6],
            ['food_id' => 7, 'food_category_id' => 1], ['food_id' => 7, 'food_category_id' => 2], ['food_id' => 7, 'food_category_id' => 6],
            ['food_id' => 8, 'food_category_id' => 1], ['food_id' => 8, 'food_category_id' => 2], ['food_id' => 8, 'food_category_id' => 6],

            ['food_id' => 9, 'food_category_id' => 2], ['food_id' => 9, 'food_category_id' => 3],
            ['food_id' => 10, 'food_category_id' => 2],

            ['food_id' => 11, 'food_category_id' => 1], ['food_id' => 11, 'food_category_id' => 2],
            ['food_id' => 12, 'food_category_id' => 1], ['food_id' => 12, 'food_category_id' => 2],

            ['food_id' => 13, 'food_category_id' => 1], ['food_id' => 13, 'food_category_id' => 2],
            ['food_id' => 14, 'food_category_id' => 1], ['food_id' => 14, 'food_category_id' => 2],
            ['food_id' => 15, 'food_category_id' => 1], ['food_id' => 15, 'food_category_id' => 2],
        ]);

        DB::table('food_to_allergenics')->insert([
           ['food_id' => 9, 'allergenic_id' => 1],
           ['food_id' => 10, 'allergenic_id' => 1],
           ['food_id' => 11, 'allergenic_id' => 1],

           ['food_id' => 13, 'allergenic_id' => 4],
           ['food_id' => 14, 'allergenic_id' => 4],
           ['food_id' => 15, 'allergenic_id' => 4],

           ['food_id' => 16, 'allergenic_id' => 1], ['food_id' => 16, 'allergenic_id' => 2], ['food_id' => 16, 'allergenic_id' => 9],
           ['food_id' => 17, 'allergenic_id' => 1], ['food_id' => 17, 'allergenic_id' => 2],
        ]);
    }
}
