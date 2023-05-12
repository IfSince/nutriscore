<?php

namespace App\Services;

use App\Models\User;

class UserService {
    public function create(array $data): User {
        return User::create([
            'email' => $data['email'],
            'password' => $data['password'],
            'user_type_id' => $data['userTypeId'],
            'first_name' => $data['firstName'],
            'last_name' => $data['lastName'],
            'file_id' => null,
            'gender_id' => $data['genderId'],
            'date_of_birth' => $data['dateOfBirth'],
            'height' => $data['height'],
            'accepted_tos' => $data['acceptedTos'],
            'selected_weight_unit' => $data['selectedWeightUnit'],
            'selected_height_unit' => $data['selectedHeightUnit'],
        ]);
    }
}
