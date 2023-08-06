<?php

namespace App\Services;

use App\Models\Meal;
use App\Models\User;
use Illuminate\Support\Collection;

class MealService {
    public function create(array $data, User $user): Meal {
        $meal = $user->meals()->create([
            'description' => $data['description'],
            'file_id' => $data['fileId'],
        ]);

        $meal->categories()->attach(new Collection($data['categories']));

        $foodCollection = collect($data['foods'])->mapWithKeys(fn($value) => [$value['id'] => ['amount' => $value['selectedAmount']]]);
        $meal->foods()->attach($foodCollection);

        $meal->save();

        return $meal;
    }

    public function update(array $data, Meal $meal): Meal {
        $meal->description = $data['description'];
        $meal->file_id = null;

        $categoryIds = (new Collection($data['categories']))->map(fn(array $category) => $category['id']);
        $meal->categories()->sync($categoryIds);

        $foodCollection = collect($data['foodItems'])->mapWithKeys(fn($value) => [$value['id'] => ['amount' => $value['selectedAmount']]]);
        $meal->foods()->sync($foodCollection);

        $meal->save();

        return $meal;
    }

}
