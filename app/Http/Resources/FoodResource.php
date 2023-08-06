<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FoodResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'unit' => $this->unit,
            'amount' => floatval($this->amount),
            'calories' => floatval($this->calories),
            'protein' => floatval($this->protein),
            'carbohydrates' => floatval($this->carbohydrates),
            'fats' => floatval($this->fats),
            'fileId' => $this->file_id,
            'selectedAmount' => $this->whenPivotLoaded('meal_to_food', fn() => floatval($this->pivot->amount)),
            'categories' => $this->categories,
            'allergenics' => $this->allergenics,
        ];
    }
}
