<?php

namespace App\Services;

use App\Models\Food;
use Illuminate\Support\Collection;

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

        $categoryIds = (new Collection($data['categories']))->map(fn(array $category) => $category['id']);
        $food->categories()->attach($categoryIds);

        $allergenicIds = (new Collection($data['categories']))->map(fn(array $allergenic) => $allergenic['id']);
        $food->allergenics()->attach($allergenicIds);

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

        $categoryIds = (new Collection($data['categories']))->map(fn(array $category) => $category['id']);
        $food->categories()->sync($categoryIds);

        $allergenicIds = (new Collection($data['categories']))->map(fn(array $allergenic) => $allergenic['id']);
        $food->allergenics()->sync($allergenicIds);

        $food->save();

        return $food;
    }
}
