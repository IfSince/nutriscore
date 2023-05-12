<?php

namespace App\Services;

use App\Models\IndividualMacroDistribution;

class IndividualMacroDistributionService {
    public function create(array $data): IndividualMacroDistribution {
        return IndividualMacroDistribution::create([
            'nutritional_data_id' => $data['nutritionalDataId'],
            'protein' => $data['protein'],
            'carbohydrates' => $data['carbohydrates'],
            'fats' => $data['fats']
        ]);
    }
}
