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
            ['description' => 'No sports'],
            ['description' => '1-3x sports/week'],
            ['description' => '3-5x sports/week'],
            ['description' => '6-7x sports/week'],
            ['description' => 'Daily sports and physically demanding work'],
            ['description' => 'PA Level'],
            ['description' => 'MET'],
            ['description' => 'MET Factor'],
            ['description' => 'PA Factor'],
        ]);
    }
}
