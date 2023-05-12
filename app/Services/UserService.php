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

    public function update(array $data, User $user): User {
        $user->user_type_id = $data['userTypeId'];
        $user->email = $data['email'];
        $user->first_name = $data['firstName'];
        $user->last_name = $data['lastName'];
        $user->gender_id = $data['genderId'];
        $user->date_of_birth = $data['dateOfBirth'];
        $user->height = $data['height'];
        $user->selected_height_unit = $data['selectedHeightUnit'];
        $user->selected_weight_unit = $data['selectedWeightUnit'];

        $user->save();

        return $user;
    }

    public function delete(User $user): void {
        $user->individualMacroDistribution()->delete();
        $user->nutritionalData()->delete();
        $user->weightRecordings()->delete();
        $user->file()->delete();
        $user->allergenics()->delete();

        $user->delete();
    }
}
