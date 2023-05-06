<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class NutritionalData extends Model
{
    use HasFactory;

    protected $table = 'nutritional_data';

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function nutritionType(): BelongsTo {
        return $this->belongsTo(NutritionType::class);
    }

    public function calculationType(): BelongsTo {
        return $this->belongsTo(CalculationType::class);
    }

    public function activityLevel(): BelongsTo {
        return $this->belongsTo(ActivityLevel::class);
    }

    public function individualMacroDistribution(): HasOne {
        return $this->hasOne(IndividualMacroDistribution::class);
    }
}
