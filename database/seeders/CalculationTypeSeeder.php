<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalculationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('calculation_types')->insert([
            ['id' => 1, 'description' => 'Easy'],
            ['id' => 2, 'description' => 'Complicated'],
            ['id' => 3, 'description' => 'Harris Benedict'],
            ['id' => 4, 'description' => 'Mifflin-St. Jeor'],
        ]);
    }
}
