<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        $this->call([
            UserTypeSeeder::class,
            ActivityLevelSeeder::class,
            CalculationTypeSeeder::class,
            GenderSeeder::class,
            NutritionTypeSeeder::class,
            AllergenicSeeder::class,
        ]);
    }
}
