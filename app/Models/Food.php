<?php

namespace App\Models;

use App\Models\Enums\Unit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Food extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
      'unit' => Unit::class,
    ];

    public function file(): BelongsTo {
        return $this->belongsTo(File::class);
    }

    public function foodCategories(): BelongsToMany {
        return $this->belongsToMany(FoodCategory::class, 'food_to_food_categories')->withTimestamps();
    }

    public function foodAllergenics(): BelongsToMany {
        return $this->belongsToMany(Allergenic::class, 'food_to_allergenics')->withTimestamps();
    }
}
