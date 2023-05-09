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
            ['description' => 'Easy'],
            ['description' => 'Complicated'],
            ['description' => 'Harris Benedict'],
            ['description' => 'Mifflin-St. Jeor'],
        ]);
    }
}
