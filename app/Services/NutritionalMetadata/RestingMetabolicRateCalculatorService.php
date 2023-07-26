<?php

namespace App\Services\NutritionalMetadata;

use App\Models\Gender;
use App\Models\User;

class RestingMetabolicRateCalculatorService {
    public function calculateRestingMetabolicRate(User $user): int {
        $calculationType = $user->nutritionalData->calculationType;
        $gender = $user->gender;
        $weight = $user->currentWeightRecording->weight;
        $height = $user->height;
        $age = $user->age();

        return match ($calculationType->id) {
            1 => $this->getRmrEasy($gender, $weight),
            2 => $this->getRmrComplicated($gender, $weight, $age),
            3 => $this->getRmrHarrisBenedict($gender, $weight, $age, $height),
            4 => $this->getRmrMifflinStJeor($gender, $weight, $age, $height),
        };
    }

    private function getRmrEasy(
        Gender $gender,
        int $weight
    ): int {
        return match (true) {
            $gender->isFemale() => 700 + 7 * $weight,
            $gender->isMale() => 900 + 10 * $weight
        };
    }

    private function getRmrComplicated(Gender $gender, int $weight, int $age): int {
        if ($gender->isFemale()) { //FEMALE
            return match (true) {
                ($age >= 10 && $age <= 18) => ($weight * 0.056 + 2.898) * 239,
                ($age >= 19 && $age <= 30) => ($weight * 0.062 + 2.036) * 239,
                ($age >= 31 && $age <= 60) => ($weight * 0.034 + 3.538) * 239,
                ($age >= 61) => ($weight * 0.038 + 2.755) * 239
            };
        } else if ($gender->isMale()) { //MALE
            return match (true) {
                ($age >= 10 && $age <= 18) => ($weight * 0.074 + 2.754) * 239,
                ($age >= 19 && $age <= 30) => ($weight * 0.063 + 2.896) * 239,
                ($age >= 31 && $age <= 60) => ($weight * 0.048 + 3.653) * 239,
                ($age >= 61) => ($weight * 0.049 + 2.459) * 239
            };
        }
        return 0;
    }

    private function getRmrHarrisBenedict(Gender $gender, int $weight, int $age, int $height): int {
        return match (true) {
            $gender->isFemale() => 655.1 + (9.563 * $weight) + (1.85 * $height) - (4.676 * $age),
            $gender->isMale() => 66.5 + (13.75 * $weight) + (5.003 * $height) - (6.775 * $age),
        };
    }

    private function getRmrMifflinStJeor(Gender $gender, int $weight, int $age, int $height): int {
        $value = match(true) {
            $gender->isFemale() => -5,
            $gender->isMale() => 161,
        };
        return ($height * 6.25) + ($weight * 9.99) - ($age * 4.92) - ($value);
    }
}
