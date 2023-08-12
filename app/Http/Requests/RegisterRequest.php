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
            'user.password' => ['required', 'string', 'min:8'],
            'user.firstName' => ['nullable', 'string', 'min:2', 'max:255'],
            'user.lastName' => ['required', 'string', 'min:2', 'max:255'],
            'user.genderId' => ['required', 'integer', 'exists:genders,id'],
            'user.dateOfBirth' => ['required', 'date'],
            'user.height' => ['required', 'integer', 'min:0'],
            'user.selectedHeightUnit' => ['required', new Enum(Unit::class)],
            'user.selectedWeightUnit' => ['required', new Enum(Unit::class)],

            'weightRecording.weight' => ['required', 'integer', 'min:0'],
            'weightRecording.dateOfRecording' => ['required', 'date'],

            'nutritionalData.nutritionTypeId' => ['required', 'integer', 'exists:nutrition_types,id'],
            'nutritionalData.calculationTypeId' => ['required', 'integer', 'exists:calculation_types,id'],
            'nutritionalData.activityLevelId' => ['required', 'integer', 'exists:activity_levels,id'],
            'nutritionalData.goal' => ['required', new Enum(Goal::class)],
            'nutritionalData.calorieRestriction' => ['nullable', 'integer'],

            'nutritionalData.physicalActivities' => ['nullable', 'required_if:nutritionalData.activityLevelId,6'],
            'nutritionalData.physicalActivities.sleeping' => ['nullable', 'integer', 'min:0', 'max:24'],
            'nutritionalData.physicalActivities.onlySitting' => ['nullable', 'integer', 'min:0', 'max:24'],
            'nutritionalData.physicalActivities.occasionalActivities' => ['nullable', 'integer', 'min:0', 'max:24'],
            'nutritionalData.physicalActivities.mostlySittingOrStanding' => ['nullable', 'integer', 'min:0', 'max:24'],
            'nutritionalData.physicalActivities.mostlyWalkingOrStanding' => ['nullable', 'integer', 'min:0', 'max:24'],
            'nutritionalData.physicalActivities.physicallyDemanding' => ['nullable', 'integer', 'min:0', 'max:24'],

            'individualMacroDistribution.protein' => ['nullable', 'integer', 'min:0'],
            'individualMacroDistribution.carbohydrates' => ['nullable', 'integer', 'min:0'],
            'individualMacroDistribution.fats' => ['nullable', 'integer', 'min:0'],

            'allergenics' => ['nullable', 'array'],
            'allergenics.*.id' => ['sometimes', 'distinct', 'integer', 'exists:allergenics,id'],
            'allergenics.*.description' => ['string'],
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
