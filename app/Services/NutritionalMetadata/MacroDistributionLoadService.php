<?php

namespace App\Services\NutritionalMetadata;

use App\Models\MacroDistribution;
use App\Models\User;

class MacroDistributionLoadService {
    public function getMacroDistribution(User $user) {
        $nutritionalData = $user->nutritionalData;
        $nutritionType = $nutritionalData->nutritionType;

        if ($nutritionType->id === 8) {
            $individualMacroDistribution = $nutritionalData->individualMacroDistribution;

            return new MacroDistribution(
                $individualMacroDistribution->protein,
                $individualMacroDistribution->carbohydrates,
                $individualMacroDistribution->fats,
            );
        } else {
            return match($nutritionType->id) {
                1 => new MacroDistribution(15, 55, 30), // Normal
                2 => new MacroDistribution(15,  5, 80), // Ketogenic
                3 => new MacroDistribution(30, 25, 45), // Low carb
                4 => new MacroDistribution(20,  70, 10), // Low fat
                5 => new MacroDistribution(35,  35, 30), // High protein
                6 => new MacroDistribution(30,  15, 55), // High protein + high fat
                7 => new MacroDistribution(10,  60, 30) // DACH Reference
            };
        }
    }

}
