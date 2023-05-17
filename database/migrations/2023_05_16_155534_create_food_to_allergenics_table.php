<?php

use App\Models\Allergenic;
use App\Models\Food;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('food_to_allergenics', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Food::class)->comment('Foreign key for food')
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignIdFor(Allergenic::class)->comment('Foreign key for allergenics')
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['food_id', 'allergenic_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('food_to_allergenics');
    }
};
