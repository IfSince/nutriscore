<?php

namespace App\Http\Requests;

use App\Models\Enums\Goal;
use App\Models\NutritionalData;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class NutritionalDataRequest extends FormRequest {
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
            'nutritionTypeId' => ['required', 'integer', 'exists:nutrition_types,id'],
            'calculationTypeId' => ['required', 'integer', 'exists:calculation_types,id'],
            'activityLevelId' => ['required', 'integer', 'exists:activity_levels,id'],
            'physicalActivityLevel' => ['nullable', 'integer', 'min:0', 'required_if:activityLevelId,6'],
            'goal' => ['required', new Enum(Goal::class)],
            'calorieRestriction' => ['nullable', 'integer'],
        ];
    }
}
