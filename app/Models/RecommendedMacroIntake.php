<?php

namespace App\Models;

class RecommendedMacroIntake {
    public function __construct(
        public int $protein,
        public int $carbohydrates,
        public int $fats,
    ) {
    }

}
