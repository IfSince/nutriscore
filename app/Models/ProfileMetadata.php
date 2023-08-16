<?php

namespace App\Models;

use JsonSerializable;

class ProfileMetadata implements JsonSerializable {
    public function __construct(
        public float $bmi,
        public float $rmr,
        public int $age,
        public int $currentWeight
    ) {}

    public function jsonSerialize(): array {
        return [
            'bmi' => number_format($this->bmi, 2),
            'rmr' => $this->rmr,
            'age' => $this->age,
            'currentWeight' => $this->currentWeight,
        ];
    }
}
