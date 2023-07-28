<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Meal extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function file(): BelongsTo {
        return $this->belongsTo(File::class);
    }

    public function foods(): BelongsToMany {
        return $this->belongsToMany(Food::class, 'meal_to_food')->withTimestamps()->withPivot(['amount']);
    }

    public function categories(): BelongsToMany {
        return $this->belongsToMany(FoodCategory::class, 'meal_to_food_categories')->withTimestamps();
    }

    public function calories(): int {
        return $this->foods->map(fn(Food $food) => $food->calories * $food->pivot->amount / $food->amount)->sum();
    }

    public function protein(): int {
        return $this->foods->map(fn(Food $food) => $food->protein * $food->pivot->amount / $food->amount)->sum();
    }

    public function carbohydrates(): int {
        return $this->foods->map(fn(Food $food) => $food->protein * $food->pivot->amount / $food->amount)->sum();
    }

    public function fats(): int {
        return $this->foods->map(fn(Food $food) => $food->protein * $food->pivot->amount / $food->amount)->sum();
    }
}
