<?php

use App\Models\Meal;
use App\Models\User;
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
        Schema::create('meal_recordings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Meal::class)->comment('Foreign key for meal')
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignIdFor(User::class)->comment('Foreign key for user')
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->date('date_of_recording')->comment('Date of recording');
            $table->string('time_of_day')->comment('Enum value time of day');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meal_recordings');
    }
};
