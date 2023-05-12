<?php

namespace App\Services;

use App\Models\WeightRecording;
use Illuminate\Support\Carbon;

class WeightRecordingService {
    public function create(array $data): WeightRecording {
        return WeightRecording::create([
            'user_id' => $data['userId'],
            'weight' => $data['weight'],
            'date_of_recording' => $data['dateOfRecording'] ?? Carbon::now()->toDate()
        ]);
    }
}
