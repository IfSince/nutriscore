<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        DB::table('user_types')->insert([
            ['id' => 1, 'description' => 'Admin'],
            ['id' => 2, 'description' => 'Person'],
            ['id' => 3, 'description' => 'Patient'],
            ['id' => 4, 'description' => 'Technical User'],
        ]);
    }
}
