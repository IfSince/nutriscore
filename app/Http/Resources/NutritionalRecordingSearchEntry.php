<?php

namespace App\Http\Resources;

use App\Models\Enums\NutritionalRecordingType;
use App\Models\Enums\Unit;
use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NutritionalRecordingSearchEntry extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array {
        $data = [
            'id' => $this->id,
            'type' => NutritionalRecordingType::FOOD,
            'amount' => $this->whenHas('amount', $this->amount, 1),
            'unit' => $this->whenHas('unit', $this->unit, Unit::AMOUNT),
            'description' => $this->description,
            'calories' => $this->whenHas('calories'),
            'protein' => $this->whenHas('protein'),
            'carbohydrates' => $this->whenHas('carbohydrates'),
            'fats' => $this->whenHas('fats'),
        ];

        if ($this->resource instanceof Meal) {
            $data['type'] = NutritionalRecordingType::MEAL;
            $data['calories'] = $this->calories();
            $data['protein'] = $this->protein();
            $data['carbohydrates'] = $this->carbohydrates();
            $data['fats'] = $this->fats();
        }

        return $data;
    }
}
