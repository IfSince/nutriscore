<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AllergenicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('allergenics')->insert([
           ['id' => 1, 'description' => 'Milk'],
           ['id' => 2, 'description' => 'Egg'],
           ['id' => 3, 'description' => 'Peanuts'],
           ['id' => 4, 'description' => 'Tree Nuts'],
           ['id' => 5, 'description' => 'Wheat'],
           ['id' => 6, 'description' => 'Soy'],
           ['id' => 7, 'description' => 'Fish'],
           ['id' => 8, 'description' => 'Shellfish'],
           ['id' => 9, 'description' => 'Sesame'],
        ]);
    }
}
