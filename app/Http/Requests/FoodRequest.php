<?php

namespace App\Http\Requests;

use App\Models\Enums\Unit;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class FoodRequest extends FormRequest {
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
            'description' => ['required', 'string', 'max:255'],
            'unit' => ['required', new Enum(Unit::class)],
            'amount' => ['required', 'integer', 'min:1'],
            'calories' => ['required', 'integer', 'min:0'],
            'protein' => ['required', 'integer', 'min:0'],
            'carbohydrates' => ['required', 'integer', 'min:0'],
            'fats' => ['required', 'integer', 'min:0'],
            'fileId' => ['nullable', 'integer', 'exists:file,id'],
            'categoryIds' => ['array'],
            'allergenicIds' => ['array'],
            'categoryIds.*' => ['sometimes', 'integer', 'exists:food_categories,id'],
            'allergenicIds.*' => ['sometimes', 'integer', 'exists:allergenics,id'],
        ];
    }
}
