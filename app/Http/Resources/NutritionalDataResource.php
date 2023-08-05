<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NutritionalDataResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array {
        return [
            'id' => $this->id,
            'userId' => $this->user_id,
            'nutritionTypeId' => $this->nutrition_type_id,
            'calculationTypeId' => $this->calculation_type_id,
            'activityLevelId' => $this->activity_level_id,
            //            'physicalActivityLevel' => $this->physicalActivityLevel,
            'goal' => $this->goal,
            'calorieRestriction' => $this->calorie_restriction ?? 0,
        ];
    }
}
