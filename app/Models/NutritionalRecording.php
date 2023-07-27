<?php

namespace App\Models;

use App\Models\Enums\NutritionalRecordingType;
use App\Models\Enums\TimeOfDay;
use App\Models\Enums\Unit;
use JsonSerializable;

class NutritionalRecording implements JsonSerializable {
    public function __construct(
        public int $id,
        public int $recordingId,
        public string $description,
        public TimeOfDay $timeOfDay,
        public NutritionalRecordingType $type,
        public string $dateOfRecording,
        public int $amount,
        public int $calories,
        public ?Unit $unit,
    ) {
    }

    public function jsonSerialize(): array {
        return [
            'id' => $this->id,
            'recordingId' => $this->recordingId,
            'description' => $this->description,
            'timeOfDay' => $this->timeOfDay,
            'type' => $this->type,
            'dateOfRecording' => $this->dateOfRecording,
            'amount' => $this->amount,
            'calories' => $this->calories,
            'unit' => $this->unit
        ];
    }
}
