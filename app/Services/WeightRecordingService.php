<?php

namespace App\Services;

use App\Models\User;
use App\Models\WeightRecording;
use Illuminate\Support\Carbon;

class WeightRecordingService {
    public function create(array $data, User $user): WeightRecording {
        return $user->weightRecordings()->create([
            'weight' => $data['weight'],
            'date_of_recording' => $data['dateOfRecording'] ?? Carbon::now()->toDate()
        ]);
    }

    public function update(array $data, WeightRecording $weightRecording): WeightRecording {
        $weightRecording->weight = $data['weight'];
        $weightRecording->date_of_recording = $data['dateOfRecording'];

        $weightRecording->save();

        return $weightRecording;
    }
}
