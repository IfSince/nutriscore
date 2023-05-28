<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MealRequest extends FormRequest {
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
            'fileId' => ['nullable', 'integer', 'exists:file,id'],
            'categoryIds' => ['array'],
            'categoryIds.*' => ['sometimes', 'integer', 'exists:food_categories,id'],
            'foods' => ['array'],
            'foods.*.id' => ['sometimes', 'distinct', 'integer', 'exists:food,id'],
            'foods.*.amount' => ['sometimes', 'integer', 'min:0'],
        ];
    }
}
