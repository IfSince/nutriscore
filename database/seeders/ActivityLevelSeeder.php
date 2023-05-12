<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivityLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('activity_levels')->insert([
            ['id' => 1, 'description' => 'No sports'],
            ['id' => 2, 'description' => '1-3x sports/week'],
            ['id' => 3, 'description' => '3-5x sports/week'],
            ['id' => 4, 'description' => '6-7x sports/week'],
            ['id' => 5, 'description' => 'Daily sports and physically demanding work'],
            ['id' => 6, 'description' => 'PA Level'],
            ['id' => 7, 'description' => 'MET'],
            ['id' => 8, 'description' => 'MET Factor'],
            ['id' => 9, 'description' => 'PA Factor'],
        ]);
    }
}
