<?php

namespace App\Services;

use App\Models\MealRecording;
use App\Models\User;

class MealRecordingService {
    public function create(array $data, User $user): MealRecording {
        return $user->mealRecordings()->create([
            'meal_id' => $data['mealId'],
            'date_of_recording' => $data['dateOfRecording'],
            'time_of_day' => $data['timeOfDay'],
            'amount' => $data['amount'],
        ]);
    }

    public function update(array $data, MealRecording $mealRecording): MealRecording {
        $mealRecording->date_of_recording = $data['dateOfRecording'];
        $mealRecording->time_of_day = $data['timeOfDay'];
        $mealRecording->amount = $data['amount'];

        return $mealRecording;
    }

}
