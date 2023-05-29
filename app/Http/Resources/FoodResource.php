<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FoodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'unit' => $this->unit,
            'amount' => $this->amount,
            'calories' => $this->calories,
            'protein' => $this->protein,
            'carbohydrates' => $this->carbohydrates,
            'fats' => $this->fats,
            'file_id' => $this->file_id,
            'selectedAmount' => $this->whenPivotLoaded('meal_to_food', fn() => $this->pivot->amount),
            $this->mergeWhen(!$this->relationLoaded('pivot'), [
                'categories' => $this->categories,
                'allergenics' => $this->allergenics,
            ]),
        ];
    }
}
