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
        Schema::create('individual_macro_distributions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nutritional_data_id');
            $table->integer('protein')->comment('Protein portion');
            $table->integer('carbohydrates')->comment('Carbohydrates portion');
            $table->integer('fats')->comment('Fats portion');
            $table->timestamps();

            $table->foreign('nutritional_data_id')->references('id')->on('nutritional_data')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('individual_macro_distributions');
    }
};
