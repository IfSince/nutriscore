<?php

namespace App\Services;

use App\Models\NutritionalData;

class NutritionalDataService {
    public function create(array $data): NutritionalData {
        return NutritionalData::create([
            'user_id' => $data['userId'],
            'nutrition_type_id' => $data['nutritionTypeId'],
            'calculation_type_id' => $data['calculationTypeId'],
            'activity_level_id' => $data['activityLevelId'],
            'physical_activity_level' => $data['physicalActivityLevel'],
            'goal' => $data['goal'],
            'calorie_restriction' => $data['calorieRestriction'],
        ]);
    }

    public function update($data, NutritionalData $nutritionalData): NutritionalData {
        $nutritionalData->nutrition_type_id = $data['nutritionTypeId'];
        $nutritionalData->calculation_type_id = $data['calculationTypeId'];
        $nutritionalData->activity_level_id = $data['activityLevelId'];
        $nutritionalData->physical_activity_level = $data['physicalActivityLevel'];
        $nutritionalData->goal = $data['goal'];
        $nutritionalData->calorie_restriction = $data['calorieRestriction'];

        $nutritionalData->save();

        return $nutritionalData;
    }
}
