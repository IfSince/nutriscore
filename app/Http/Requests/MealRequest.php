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
            'categories' => ['array'],
            'categories.*.id' => ['sometimes', 'integer', 'exists:food_categories,id'],
            'foodItems' => ['array'],
            'foodItems.*.id' => ['sometimes', 'distinct', 'integer', 'exists:food,id'],
            'foodItems.*.selectedAmount' => ['sometimes', 'numeric', 'min:0'],
        ];
    }
}
