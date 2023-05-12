<?php

namespace App\Http\Requests;

use App\Models\Enums\Unit;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(Request $request): array
    {
        return [
            'userTypeId' => ['required', 'integer', 'exists:user_types,id'],
            'email' => ['required', 'string', 'email', 'max:255', "unique:users,email,{$request->get('id')}"],
            'firstName' => ['nullable', 'string', 'min:2', 'max:255'],
            'lastName' => ['required', 'string', 'min:2', 'max:255'],
            'genderId' => ['required', 'integer', 'exists:genders,id'],
            'dateOfBirth' => ['required', 'date'],
            'height' => ['required', 'integer', 'min:0'],
            'selectedHeightUnit' => ['required', new Enum(Unit::class)],
            'selectedWeightUnit' => ['required', new Enum(Unit::class)],
        ];
    }
}
