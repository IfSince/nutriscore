<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function isFemale(): bool {
        return $this->id === 1;
    }

    public function isMale(): bool {
        return $this->id === 2;
    }
}
