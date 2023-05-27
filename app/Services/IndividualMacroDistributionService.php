<?php

namespace App\Services;

use App\Models\IndividualMacroDistribution;
use App\Models\NutritionalData;

class IndividualMacroDistributionService {
    public function create(array $data, NutritionalData $nutritionalData): IndividualMacroDistribution {
        return $nutritionalData->individualMacroDistribution()->create([
            'protein' => $data['protein'],
            'carbohydrates' => $data['carbohydrates'],
            'fats' => $data['fats']
        ]);
    }
}
