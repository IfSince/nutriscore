<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Casts\Hash;
use App\Models\Enums\TimeOfDay;
use App\Models\Enums\Unit;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'email',
        'password',
        'user_type_id',
        'first_name',
        'last_name',
        'file_id',
        'gender_id',
        'date_of_birth',
        'height',
        'accepted_tos',
        'selected_weight_unit',
        'selected_height_unit',
    ];

    protected $hidden = [
        'password',
        'email_verified_at',
        'remember_token',
        'created_at',
        'updated_at',
        'pivot',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime:Y-m-d',
        'date_of_birth' => 'datetime:Y-m-d',
        'password' => Hash::class,
        'selected_weight_unit' => Unit::class,
        'selected_height_unit' => Unit::class,
    ];

    // used to initially load relations
//    protected $with = ['userType', 'file', 'gender', 'nutritionalData', 'weightRecordings', 'allergenics', 'individualMacroDistribution'];

    protected function firstName(): Attribute {
        return Attribute::make(
            get: fn(string $value) => ucfirst($value),
            set: fn(string $value) => strtolower($value),
        );
    }

    protected function lastName(): Attribute {
        return Attribute::make(
            get: fn(string $value) => ucfirst($value),
            set: fn(string $value) => strtolower($value),
        );
    }

    public function userType(): BelongsTo {
        return $this->belongsTo(UserType::class);
    }

    public function file(): BelongsTo {
        return $this->belongsTo(File::class);
    }

    public function gender(): BelongsTo {
        return $this->belongsTo(Gender::class);
    }

    public function nutritionalData(): HasOne {
        return $this->hasOne(NutritionalData::class);
    }

    public function individualMacroDistribution(): HasOneThrough {
        return $this->hasOneThrough(IndividualMacroDistribution::class, NutritionalData::class);
    }

    public function currentWeightRecording(): HasOne {
        return $this->hasOne(WeightRecording::class)->latestOfMany();
    }

    public function weightRecordings(): HasMany {
        return $this->hasMany(WeightRecording::class);
    }

    public function allergenics(): BelongsToMany {
        return $this->belongsToMany(Allergenic::class, 'user_to_allergenics')->withTimestamps();
    }

    public function meals(): HasMany {
        return $this->hasMany(Meal::class);
    }

    public function mealRecordings(): HasMany {
        return $this->hasMany(MealRecording::class);
    }

    public function foodRecordings(): HasMany {
        return $this->hasMany(FoodRecording::class);
    }

    public function age(): int {
        return Carbon::parse($this->date_of_birth)->age;
    }
}
