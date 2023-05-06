<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nutrition_types', function (Blueprint $table) {
            $table->id();

            $table->string('description')->comment('Description')->unique();
            $table->integer('protein')->comment('Protein portion')->nullable();
            $table->integer('carbohydrates')->comment('Carbohydrates portion')->nullable();
            $table->integer('fats')->comment('Fats portion')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nutrition_types');
    }
};
