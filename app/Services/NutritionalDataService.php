<?php

namespace App\Services;

use App\Models\NutritionalData;
use App\Models\User;

class NutritionalDataService {
    public function create(array $data, User $user): NutritionalData {
        $physicalActivityLevel = null;
        if (isset($data['physicalActivities'])) {
            $physicalActivityLevel = (
                    $data['physicalActivities']['sleeping'] * 0.95 +
                    $data['physicalActivities']['onlySitting'] * 1.2 +
                    $data['physicalActivities']['occasionalActivities'] * 1.4 +
                    $data['physicalActivities']['mostlySittingOrStanding'] * 1.6 +
                    $data['physicalActivities']['mostlyWalkingOrStanding'] * 1.8 +
                    $data['physicalActivities']['physicallyDemanding'] * 2.2
                ) / 24;
        }

        return $user->nutritionalData()->create([
            'nutrition_type_id' => $data['nutritionTypeId'],
            'calculation_type_id' => $data['calculationTypeId'],
            'activity_level_id' => $data['activityLevelId'],
            'physical_activity_level' => $physicalActivityLevel ?? null,
            'goal' => $data['goal'],
            'calorie_restriction' => $data['calorieRestriction'],
        ]);
    }

    public function update($data, NutritionalData $nutritionalData): NutritionalData {
        if (isset($data['physicalActivities'])) {
            $physicalActivityLevel = (
                    $data['physicalActivities']['sleeping'] * 0.95 +
                    $data['physicalActivities']['onlySitting'] * 1.2 +
                    $data['physicalActivities']['occasionalActivities'] * 1.4 +
                    $data['physicalActivities']['mostlySittingOrStanding'] * 1.6 +
                    $data['physicalActivities']['mostlyWalkingOrStanding'] * 1.8 +
                    $data['physicalActivities']['physicallyDemanding'] * 2.2
                ) / 24;
        }

        $nutritionalData->nutrition_type_id = $data['nutritionTypeId'];
        $nutritionalData->calculation_type_id = $data['calculationTypeId'];
        $nutritionalData->activity_level_id = $data['activityLevelId'];
        $nutritionalData->physical_activity_level = $physicalActivityLevel ?? null;
        $nutritionalData->goal = $data['goal'];
        $nutritionalData->calorie_restriction = $data['calorieRestriction'];

        $nutritionalData->save();

        return $nutritionalData;
    }
}
