<?php

namespace App\Models;

use App\Models\Enums\FileType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'file_type' => FileType::class,
    ];
}
