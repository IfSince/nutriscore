<?php

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
        Schema::create('weight_recordings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->comment('Foreign key for user')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->float('weight')->comment('Weight in kg');
            $table->date('date_of_recording');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weight_recordings');
    }
};
