<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WeightRecording extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'date_of_recording' => 'datetime:Y-m-d',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
