<?php

namespace App\Models;

class MacroDistribution {
    public function __construct(
        public int $protein,
        public int $carbohydrates,
        public int $fats,
    ) {
    }

}
