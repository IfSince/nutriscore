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
        return $this->belongsToMany(Food::class, 'meal_to_food')->withTimestamps();
    }

    public function categories(): BelongsToMany {
        return $this->belongsToMany(FoodCategory::class, 'meal_to_food_categories')->withTimestamps();
    }

}
