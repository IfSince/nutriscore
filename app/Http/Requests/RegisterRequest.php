<?php

namespace App\Http\Requests;

use App\Models\Enums\Goal;
use App\Models\Enums\Unit;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class RegisterRequest extends FormRequest {

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
            'user.userTypeId' => ['required', 'integer', 'exists:user_types,id'],
            'user.email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'user.password' => ['required', 'string', 'min:8', 'confirmed'],
            'user.firstName' => ['nullable', 'string', 'min:2', 'max:255'],
            'user.lastName' => ['required', 'string', 'min:2', 'max:255'],
            'user.genderId' => ['required', 'integer', 'exists:genders,id'],
            'user.dateOfBirth' => ['required', 'date'],
            'user.height' => ['required', 'integer', 'min:0'],
            'user.selectedHeightUnit' => ['required', new Enum(Unit::class)],
            'user.selectedWeightUnit' => ['required', new Enum(Unit::class)],
            'user.acceptedTos' => ['required', 'boolean', 'accepted'],

            'weightRecording.weight' => ['required', 'integer', 'min:0'],
            'weightRecording.dateOfBirth' => ['nullable', 'date'],

            'nutritionalData.nutritionTypeId' => ['required', 'integer', 'exists:nutrition_types,id'],
            'nutritionalData.calculationTypeId' => ['required', 'integer', 'exists:calculation_types,id'],
            'nutritionalData.activityLevelId' => ['required', 'integer', 'exists:activity_levels,id'],
            'nutritionalData.physicalActivityLevel' => ['nullable', 'integer', 'min:0', 'required_if:nutritionalData.activityLevelId,6'],
            'nutritionalData.goal' => ['required', new Enum(Goal::class)],
            'nutritionalData.calorieRestriction' => ['nullable', 'integer'],

            'individualMacroDistribution' => ['nullable', 'prohibited_unless:nutritionalData.nutritionTypeId,8'],
            'individualMacroDistribution.protein' => ['required', 'integer', 'min:0'],
            'individualMacroDistribution.carbohydrates' => ['required', 'integer', 'min:0'],
            'individualMacroDistribution.fats' => ['required', 'integer', 'min:0'],

            'allergenicIds' => ['nullable', 'array', 'exists:allergenics,id']
        ];
    }

    public function messages(): array {
        return [
            'success' => 'This gets added if all validations pass'
        ];
    }

    public function filters(): array {
        return [
            'user.email' => 'trim|lowercase',
        ];
    }
}
