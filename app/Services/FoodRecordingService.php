<?php

namespace App\Services;

use App\Models\FoodRecording;
use App\Models\User;

class FoodRecordingService {
    public function create(array $data, User $user): FoodRecording {
        return $user->foodRecordings()->create([
            'food_id' => $data['foodId'],
            'date_of_recording' => $data['dateOfRecording'],
            'time_of_day' => $data['timeOfDay'],
            'amount' => $data['amount'],
        ]);
    }

    public function update(array $data, FoodRecording $foodRecording): FoodRecording {
        $foodRecording->date_of_recording = $data['dateOfRecording'];
        $foodRecording->time_of_day = $data['timeOfDay'];
        $foodRecording->amount = $data['amount'];

        return $foodRecording;
    }
}
