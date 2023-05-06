<?php

use App\Models\ActivityLevel;
use App\Models\CalculationType;
use App\Models\NutritionType;
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
        Schema::create('nutritional_data', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->comment('Foreign key on user')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignIdFor(NutritionType::class)->comment('Foreign key on nutrition type')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignIdFor(CalculationType::class)->comment('Foreign key on calculation type')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignIdFor(ActivityLevel::class)->comment('Foreign key on activity level')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->integer('physical_activity_level')
                ->comment('Physical activity level of user, only used if selected activity level is PAL')
                ->nullable();
            $table->string('goal')->comment('Enum value of goal of user');
            $table->integer('calorie_restriction')->comment('percentage Custom calorie restriction')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nutritional_data');
    }
};
