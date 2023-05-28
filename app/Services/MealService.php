<?php

namespace App\Services;

use App\Models\Meal;
use App\Models\User;

class MealService {
    public function create(array $data, User $user): Meal {
        $meal = $user->meals()->create([
            'description' => $data['description'],
            'file_id' => $data['fileId'],
        ]);

        $meal->categories()->attach($data['categoryIds']);

        $foods = [];
        foreach ($data['foods'] as $value) {
            $foods[$value['id']] = ['amount' => $value['amount']];
        }
        $meal->foods()->attach($foods);

        $meal->categories;
        $meal->foods;

        return $meal;
    }

    public function update(array $data, Meal $meal): Meal {
        $meal->description = $data['description'];
        $meal->file_id = null;

        $meal->categories()->sync($data['categoryIds']);


        $foods = [];
        foreach ($data['foods'] as $value) {
            $foods[$value['id']] = ['amount' => $value['amount']];
        }
        $meal->foods()->sync($foods);

        $meal->categories;
        $meal->foods;

        return $meal;
    }

}
