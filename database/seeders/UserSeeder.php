<?php

namespace Database\Seeders;

use App\Models\Enums\Goal;
use App\Models\Enums\TimeOfDay;
use App\Models\Enums\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash as HashFacade;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        DB::table('users')->insert([
            [
                'id' => 2,
                'email' => 'test@gmx.de',
                'password' => HashFacade::make('Password123!'),
                'user_type_id' => 1,
                'first_name' => 'Max',
                'last_name' => 'Mustermann',
                'gender_id' => 1,
                'date_of_birth' => '2000-01-01',
                'height' => 180,
                'accepted_tos' => 1,
                'selected_weight_unit' => Unit::KILOGRAM,
                'selected_height_unit' => Unit::CENTIMETER
            ],
            [
                'id' => 3,
                'email' => 'lisa@gmx.de',
                'password' => HashFacade::make('Password123!'),
                'user_type_id' => 1,
                'first_name' => 'Lisa',
                'last_name' => 'Müller',
                'gender_id' => 2,
                'date_of_birth' => '2003-09-27',
                'height' => 169,
                'accepted_tos' => 1,
                'selected_weight_unit' => Unit::KILOGRAM,
                'selected_height_unit' => Unit::CENTIMETER
            ],
        ]);

        DB::table('weight_recordings')->insert([
            ['user_id' => 2, 'weight' => 86, 'date_of_recording' => '2023-08-16'],
            ['user_id' => 2, 'weight' => 84, 'date_of_recording' => '2023-08-17'],
            ['user_id' => 2, 'weight' => 80, 'date_of_recording' => '2023-08-18'],
            ['user_id' => 2, 'weight' => 82, 'date_of_recording' => '2023-08-19'],
            ['user_id' => 2, 'weight' => 78, 'date_of_recording' => '2023-08-20'],
            ['user_id' => 2, 'weight' => 75, 'date_of_recording' => '2023-08-21'],
            ['user_id' => 2, 'weight' => 70, 'date_of_recording' => '2023-08-22'],
        ]);

        DB::table('nutritional_data')->insert([
            ['user_id' => 2, 'nutrition_type_id' => 1, 'calculation_type_id' => 1, 'activity_level_id' => 1, 'goal' => Goal::LOOSE, 'calorie_restriction' => 0],
        ]);

        DB::table('user_to_allergenics')->insert([
            ['user_id' => 2, 'allergenic_id' => 1],
            ['user_id' => 2, 'allergenic_id' => 3],
            ['user_id' => 2, 'allergenic_id' => 6],
        ]);


        DB::table('food_recordings')->insert([
            ['food_id' => 1, 'user_id' => 2, 'date_of_recording' => '2023-08-21', 'time_of_day' => TimeOfDay::BREAKFAST, 'amount' => 100],
            ['food_id' => 3, 'user_id' => 2, 'date_of_recording' => '2023-08-21', 'time_of_day' => TimeOfDay::BREAKFAST, 'amount' => 125],
            ['food_id' => 4, 'user_id' => 2, 'date_of_recording' => '2023-08-21', 'time_of_day' => TimeOfDay::LUNCH, 'amount' => 70],
            ['food_id' => 12, 'user_id' => 2, 'date_of_recording' => '2023-08-21', 'time_of_day' => TimeOfDay::DINNER, 'amount' => 20],

            ['food_id' => 1, 'user_id' => 2, 'date_of_recording' => '2023-08-22', 'time_of_day' => TimeOfDay::BREAKFAST, 'amount' => 100],
            ['food_id' => 3, 'user_id' => 2, 'date_of_recording' => '2023-08-22', 'time_of_day' => TimeOfDay::BREAKFAST, 'amount' => 125],
            ['food_id' => 4, 'user_id' => 2, 'date_of_recording' => '2023-08-22', 'time_of_day' => TimeOfDay::LUNCH, 'amount' => 70],
            ['food_id' => 12, 'user_id' => 2, 'date_of_recording' => '2023-08-22', 'time_of_day' => TimeOfDay::DINNER, 'amount' => 20],
        ]);
    }
}
