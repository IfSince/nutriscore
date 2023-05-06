<?php

use App\Models\File;
use App\Models\Gender;
use App\Models\UserType;
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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignIdFor(UserType::class)->comment('Foreign key for user type')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->string('first_name')->comment('First name');
            $table->string('last_name')->comment('Last name');
            $table->foreignIdFor(File::class)->comment('Foreign key for file (profile image)')->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->foreignIdFor(Gender::class)->comment('Foreign key for gender')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->date('date_of_birth')->comment('Date of birth');
            $table->integer('height')->comment('Height in cm');
            $table->boolean('accepted_tos')->comment('Accepted terms of service yes/no');
            $table->string('selected_weight_unit')->comment('Enum value of selected weight unit');
            $table->string('selected_height_unit')->comment('Enum value of selected height unit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeignIdFor(UserType::class);
            $table->dropForeignIdFor(File::class);
            $table->dropForeignIdFor(Gender::class);

            $table->dropColumn([
                'user_type_id',
                'first_name',
                'last_name',
                'file_id',
                'gender_id',
                'date_of_birth',
                'height',
                'accepted_tos',
                'selected_weight_unit',
                'selected_height_unit'
            ]);
        });
    }
};
