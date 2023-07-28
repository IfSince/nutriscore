<?php

namespace App\Services\NutritionalMetadata;

use App\Models\Enums\Goal;
use App\Models\User;
use App\Models\UserNutritionalMetadata;

class UserNutritionalMetadataLoadService {
    public function __construct(
        private readonly RestingMetabolicRateCalculatorService $restingMetabolicRateCalculatorService,
        private readonly BasalMetabolicRateCalculatorService $basalMetabolicRateCalculatorService,
        private readonly RecommendedMacroIntakeCalculateService $recommendedMacroIntakeCalculateService,
        private readonly RecordingConverterService $recordingConverterService,
    ) {
    }

    public function loadNutritionalMetadataForUser(User $user): UserNutritionalMetadata {
        $restingMetabolicRate = $this->restingMetabolicRateCalculatorService->calculateRestingMetabolicRate($user);
        $basalMetabolicRate = $this->basalMetabolicRateCalculatorService->calculateBasalMetabolicRate($restingMetabolicRate, $user);
        $calorieIntake = $this->getRecommendedCalorieIntake($basalMetabolicRate, $user->nutritionalData->goal);
        $recommendedMacroIntakeCalculation = $this->recommendedMacroIntakeCalculateService->calculateRecommendedMacroIntake($calorieIntake, $user);

        $foodRecordings = $this->recordingConverterService->convertFoodRecordingsToRecordingData($user->foodRecordings);
        $mealRecordings = $this->recordingConverterService->convertMealRecordingsToRecordingData($user->mealRecordings);

        return new UserNutritionalMetadata(
            recordings: $foodRecordings->toBase()->merge($mealRecordings)->groupBy('dateOfRecording')->all(),
            weightRecordings: $user->weightRecordings->all(),
            recommendedCalorieIntake: $calorieIntake + $user->nutritionalData->calorieRestriction,
            recommendedProteinIntake: $recommendedMacroIntakeCalculation->protein,
            recommendedCarbohydratesIntake: $recommendedMacroIntakeCalculation->carbohydrates,
            recommendedFatsIntake: $recommendedMacroIntakeCalculation->fats,
            recommendedWaterIntake: $this->getRecommendedWaterIntake($user->currentWeightRecording->weight),
            selectedWeightUnit: $user->selected_weight_unit,
        );
    }

    private function getRecommendedCalorieIntake(int $basalMetabolicRate, Goal $goal): float {
        return match ($goal) {
            Goal::KEEP => $basalMetabolicRate,
            Goal::GAIN => $basalMetabolicRate + 500,
            Goal::LOOSE => $basalMetabolicRate - 500,
        };
    }

    private function getRecommendedWaterIntake(int $weight): float {
        return $weight * 0.03;
    }
}
