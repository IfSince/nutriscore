<?php

namespace App\Models;

use App\Models\Enums\NutritionalRecordingType;
use App\Models\Enums\TimeOfDay;
use App\Models\Enums\Unit;
use JsonSerializable;

class NutritionalRecording implements JsonSerializable {
    public function __construct(
        public int $id,
        public int $itemId,
        public string $description,
        public TimeOfDay $timeOfDay,
        public NutritionalRecordingType $type,
        public string $dateOfRecording,
        public int $amount,
        public int $calories,
        public int $protein,
        public int $carbohydrates,
        public int $fats,
        public ?Unit $unit,
    ) {
    }

    public function jsonSerialize(): array {
        return [
            'id' => $this->id,
            'itemId' => $this->itemId,
            'description' => $this->description,
            'timeOfDay' => $this->timeOfDay,
            'type' => $this->type,
            'dateOfRecording' => $this->dateOfRecording,
            'amount' => $this->amount,
            'calories' => $this->calories,
            'protein' => $this->protein,
            'carbohydrates' => $this->carbohydrates,
            'fats' => $this->fats,
            'unit' => $this->unit,
        ];
    }
}
