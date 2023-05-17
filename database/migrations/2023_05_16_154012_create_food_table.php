<?php

use App\Models\File;
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
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->string('description')->comment('Description');
            $table->string('unit')->comment('Unit of amount');
            $table->decimal('amount')->comment('Amount of food');
            $table->decimal('calories')->comment('Calories');
            $table->decimal('protein')->comment('Protein');
            $table->decimal('carbohydrates')->comment('Carbohydrates');
            $table->decimal('fats')->comment('Fats');
            $table->foreignIdFor(File::class)->comment('Foreign key for file (food image)')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food');
    }
};
