<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MealRecordingResource extends JsonResource
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
            'userId' => $this->user->id,
            'dateOfRecording' => $this->date_of_recording,
            'timeOfDay' => $this->time_of_day,
            'amount' => floatval($this->amount),
            'mealItem' => MealResource::make($this->meal),
        ];
    }
}
