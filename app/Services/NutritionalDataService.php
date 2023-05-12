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
}
