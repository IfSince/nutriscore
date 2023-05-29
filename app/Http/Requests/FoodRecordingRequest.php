<?php

namespace App\Http\Requests;

use App\Models\Enums\TimeOfDay;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class FoodRecordingRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array {
        return [
            'foodId' => ['required', 'exists:food,id'],
            'dateOfRecording' => ['required', 'date'],
            'timeOfDay' => ['required', new Enum(TimeOfDay::class)],
            'amount' => ['required', 'numeric', 'min:0'],
        ];
    }
}
