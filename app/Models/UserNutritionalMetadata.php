<?php

namespace App\Models;

use App\Models\Enums\Unit;
use JsonSerializable;

class UserNutritionalMetadata implements JsonSerializable {
    public function __construct(
        public array $recordings,
        public array $weightRecordings,
        public float $recommendedCalorieIntake,
        public float $recommendedProteinIntake,
        public float $recommendedCarbohydratesIntake,
        public float $recommendedFatsIntake,
        public float $recommendedWaterIntake,
        public Unit $selectedWeightUnit,
    ) {
    }

    public function jsonSerialize(): array {
        return [
            'recordings' => $this->recordings,
            'weightRecordings' => $this->weightRecordings,
            'recommendedCalorieIntake' => $this->recommendedCalorieIntake,
            'recommendedProteinIntake' => $this->recommendedProteinIntake,
            'recommendedCarbohydratesIntake' => $this->recommendedCarbohydratesIntake,
            'recommendedFatsIntake' => $this->recommendedFatsIntake,
            'recommendedWaterIntake' => number_format($this->recommendedWaterIntake),
        ];
    }
}
