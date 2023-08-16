<?php

namespace App\Services\ProfileMetadata;

use App\Models\ProfileMetadata;
use App\Models\User;
use App\Services\NutritionalMetadata\RestingMetabolicRateCalculatorService;

class ProfileMetadataService {
    public function __construct(
        private readonly RestingMetabolicRateCalculatorService $restingMetabolicRateCalculatorService,
    ) {
    }

    public function loadProfileMetadataForUser(User $user): ProfileMetadata {
        return new ProfileMetadata(
            bmi: $this->getBmi($user),
            rmr: $this->restingMetabolicRateCalculatorService->calculateRestingMetabolicRate($user),
            age: $user->age(),
            currentWeight: $user->currentWeightRecording->weight
        );
    }

    private function getBmi(User $user): float {
        return $user->currentWeightRecording->weight / pow($user->height / 100, 2);
    }
}
