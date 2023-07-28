<?php

namespace App\Services\NutritionalRecordings;

use App\Models\Enums\NutritionalRecordingType;
use App\Models\Food;
use App\Models\FoodRecording;
use App\Models\MealRecording;
use App\Models\NutritionalRecording;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class NutritionalRecordingsLoadService {
    public function __construct() { }

    public function loadNutritionalRecordingsForUser(User $user): Collection {
        $foodRecordingsMapped = $this->loadMappedFoodRecordingsForUser($user);
        $mealRecordingsMapped = $this->loadMealRecordingsForUser($user);

        return $foodRecordingsMapped->toBase()->merge($mealRecordingsMapped)->groupBy('dateOfRecording');
    }

    private function loadMappedFoodRecordingsForUser(User $user): Collection {
        $foodRecordings = $user->foodRecordings;

        return $foodRecordings->map(function (FoodRecording $foodRecording) {
            $food = $foodRecording->food;

            return new NutritionalRecording(
                id: $foodRecording->id,
                recordingId: $food->id,
                description: $food->description,
                timeOfDay: $foodRecording->time_of_day,
                type: NutritionalRecordingType::FOOD,
                dateOfRecording: Carbon::parse($foodRecording->date_of_recording)->toDateString(),
                amount: $foodRecording->amount,
                calories: $food->calories * $foodRecording->amount / $food->amount,
                unit: $food->unit,
            );
        });
    }

    private function loadMealRecordingsForUser(User $user): Collection {
        $mealRecordings = $user->mealRecordings;

        return $mealRecordings->map(function (MealRecording $mealRecording) {
            $meal = $mealRecording->meal;
            $foods = $meal->foods;

            $calories = $foods->map(fn(Food $food) => $food->calories * ($mealRecording->amount * $food->pivot->amount) / $food->amount)->sum();

            return new NutritionalRecording(
                id: $mealRecording->id,
                recordingId: $meal->id,
                description: $meal->description,
                timeOfDay: $mealRecording->time_of_day,
                type: NutritionalRecordingType::MEAL,
                dateOfRecording: Carbon::parse($mealRecording->date_of_recording)->toDateString(),
                amount: $mealRecording->amount,
                calories: $calories,
                unit: null,
            );
        });
    }
}
