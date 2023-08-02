<?php

namespace App\Services\NutritionalMetadata;

use App\Models\Gender;
use App\Models\RecommendedMacroIntake;
use App\Models\User;

class RecommendedMacroIntakeCalculateService {
    public function __construct(
        private readonly MacroDistributionLoadService $macroDistributionLoadService,
    ) {
    }

    public function calculateRecommendedMacroIntake(int $calorieIntake, User $user): RecommendedMacroIntake {
        $nutritionType = $user->nutritionalData->nutritionType;
        $macroDistribution = $this->macroDistributionLoadService->getMacroDistribution($user);

        return new RecommendedMacroIntake(
            protein: $this->getProteinIntake(
                $calorieIntake,
                $macroDistribution->protein,
                $nutritionType->id,
                $user->currentWeightRecording->weight,
                $user->age(),
                $user->gender,
            ),
            carbohydrates: $this->getCarbohydratesIntake($calorieIntake, $macroDistribution->carbohydrates),
            fats: $this->getFatIntake($calorieIntake, $macroDistribution->fats)
        );
    }

    private function getProteinIntake(
        int $calorieIntake,
        int $percentage,
        int $nutritionTypeId,
        int $weight,
        int $age,
        Gender $gender
    ): int {
        if ($nutritionTypeId === 7) {
            switch ($age) {
                case $age >= 4 && $age < 15:
                    return $weight * 0.9;
                case $age >= 15 && $age < 19:
                    if ($gender->isMale()) {
                        return $weight * 0.9;
                    } else {
                        return $weight * 0.8;
                    }
                case $age >= 19 && $age <= 65:
                    return $weight * 0.8;
                case $age >= 1 && $age < 4:
                default:
                    return $weight;
            }
        } else {
            return ($calorieIntake * ($percentage / 100)) / 4;
        }
    }

    private function getCarbohydratesIntake(int $calorieIntake, $percentage): int {
        return ($calorieIntake * ($percentage / 100)) / 4;
    }

    private function getFatIntake(int $calorieIntake, $percentage): int {
        return ($calorieIntake * ($percentage / 100)) / 9;
    }

}
