<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Enums\Unit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'emailVerifiedAt',
        'firstName',
        'lastName',
        'dateOfBirth',
        'height',
        'acceptedTos',
        'selectedWeightUnit',
        'selectedHeightUnit',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'selected_weight_unit' => Unit::class,
        'selected_height_unit' => Unit::class,
    ];

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

    public function currentWeightRecording(): HasOne {
        return $this->hasOne(WeightRecording::class)->latestOfMany();
    }

    public function weightRecordings(): HasMany {
        return $this->hasMany(WeightRecording::class);
    }

    public function allergenics(): BelongsToMany {
        return $this->belongsToMany(Allergenic::class, 'user_to_allergenics');
    }
}
