<?php

namespace App\Services\NutritionalMetadata;

use App\Models\Food;
use App\Models\FoodRecording;
use App\Models\MealRecording;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class RecordingConverterService {
    public function convertFoodRecordingsToRecordingData(Collection $foodRecordings): Collection {
        return $foodRecordings->map(function (FoodRecording $foodRecording) {
            $food = $foodRecording->food;

            return new Collection([
                'dateOfRecording' => Carbon::parse($foodRecording->date_of_recording)->toDateString(),
                'timeOfDay' => $foodRecording->time_of_day,
                'calories' => $food->calories * $foodRecording->amount / $food->amount,
                'protein' => $food->protein * $foodRecording->amount / $food->amount,
                'carbohydrates' => $food->carbohydrates * $foodRecording->amount / $food->amount,
                'fats' => $food->fats * $foodRecording->amount / $food->amount,
            ]);
        });
    }

    public function convertMealRecordingsToRecordingData(Collection $mealRecordings): Collection {
        return $mealRecordings->map(function (MealRecording $mealRecording) {
            $meal = $mealRecording->meal;
            $foods = $meal->foods;

            $calories = $foods->map(function (Food $food) use ($mealRecording) {
                return $food->calories * ($mealRecording->amount * $food->pivot->amount) / $food->amount;
            })->sum();

            $protein = $foods->map(function (Food $food) use ($mealRecording) {
                return $food->protein * ($mealRecording->amount * $food->pivot->amount) / $food->amount;
            })->sum();

            $carbohydrates = $foods->map(function (Food $food) use ($mealRecording) {
                return $food->carbohydrates * ($mealRecording->amount * $food->pivot->amount) / $food->amount;
            })->sum();

            $fats = $foods->map(function (Food $food) use ($mealRecording) {
                return $food->fats * ($mealRecording->amount * $food->pivot->amount) / $food->amount;
            })->sum();

            return new Collection([
                'dateOfRecording' => Carbon::parse($mealRecording->date_of_recording)->toDateString(),
                'timeOfDay' => $mealRecording->time_of_day,
                'calories' => $calories,
                'protein' => $protein,
                'carbohydrates' => $carbohydrates,
                'fats' => $fats,
            ]);
        });
    }

}
