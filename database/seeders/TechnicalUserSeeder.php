<?php

namespace Database\Seeders;

use App\Models\Enums\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash as HashFacade;

class TechnicalUserSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        DB::table('users')->insert([
            [
                'id' => 1,
                'email' => 'technical-dummy@nutriscore.de',
                'password' => HashFacade::make('start123!'),
                'user_type_id' => 4, // Technical User
                'first_name' => 'User',
                'last_name' => 'deleted',
                'gender_id' => 1,
                'date_of_birth' => '2000-01-01',
                'height' => 0,
                'accepted_tos' => 1,
                'selected_weight_unit' => Unit::KILOGRAM,
                'selected_height_unit' => Unit::GRAM
            ],
        ]);
    }
}
