<?php

namespace App\Services\NutritionalMetadata;

use App\Models\User;

class BasalMetabolicRateCalculatorService {
    public function calculateBasalMetabolicRate(int $restingMetabolicRate, User $user): int {
        $activityLevel = $user->nutritionalData->activityLevel;
        $palLevel = $user->nutritionalData->palLevel;

        return match($activityLevel->id) {
            1 => $restingMetabolicRate * 1.2,
            2 => $restingMetabolicRate * 1.375,
            3 => $restingMetabolicRate * 1.55,
            4 => $restingMetabolicRate * 1.725,
            5 => $restingMetabolicRate * 1.9,
            6 => $restingMetabolicRate * $palLevel,
            7,
            8,
            9 => $restingMetabolicRate, // TODO Add recording of daily activity
        };
    }
}
