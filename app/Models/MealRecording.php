<?php

namespace App\Models;

use App\Models\Enums\TimeOfDay;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MealRecording extends Model {
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $guarded = [];

    protected $casts = [
        'date_of_recording' => 'datetime:Y-m-d',
        'time_of_day' => TimeOfDay::class,
    ];

    public function meal(): BelongsTo {
        return $this->belongsTo(Meal::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
