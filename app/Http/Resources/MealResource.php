<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MealResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'userId' => $this->user_id,
            'userName' => $this->user->last_name,
            'fileId' => $this->file_id,
            'calories' => $this->calories(),
            'protein' => $this->protein(),
            'carbohydrates' => $this->carbohydrates(),
            'fats' => $this->fats(),
            'categories' => $this->categories,
            'foodItems' => FoodResource::collection($this->foods),
        ];
    }
}
