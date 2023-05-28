<?php

namespace App\Services;

use App\Models\Food;

class FoodService {
    public function create(array $data): Food {
        $food = Food::create([
            'description' => $data['description'],
            'unit' => $data['unit'],
            'amount' => $data['amount'],
            'calories' => $data['calories'],
            'protein' => $data['protein'],
            'carbohydrates' => $data['carbohydrates'],
            'fats' => $data['fats'],
            'file_id' => null,
        ]);

        $food->foodCategories()->attach($data['categoryIds']);
        $food->foodAllergenics()->attach($data['allergenicIds']);

        return $food;
    }

    public function update(array $data, Food $food): Food {
        $food->description = $data['description'];
        $food->unit = $data['unit'];
        $food->amount = $data['amount'];
        $food->calories = $data['calories'];
        $food->protein = $data['protein'];
        $food->carbohydrates = $data['carbohydrates'];
        $food->fats = $data['fats'];
        $food->file_id = null;

        $food->foodCategories()->sync($data['categoryIds']);
        $food->foodAllergenics()->sync($data['allergenicIds']);

        $food->save();

        $food->refresh();

        return $food;
    }
}
