<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'email' => $this->email,
            'userTypeId' => $this->user_type_id,
            'firstName' => $this->first_name,
            'lastName' => $this->last_name,
            'file' => $this->file,
            'genderId' => $this->gender_id,
            'dateOfBirth' => $this->date_of_birth,
            'height' => $this->height,
            'selectedWeightUnit' => $this->selected_weight_unit,
            'selectedHeightUnit' => $this->selected_height_unit
        ];
    }
}
