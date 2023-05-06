<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NutritionalData extends Model
{
    use HasFactory;

    protected $table = 'nutritional_data';

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
