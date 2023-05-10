<?php

namespace App\Models\Enums;

enum Goal: string {
    case KEEP = 'KEEP';
    case LOOSE = 'LOOSE';
    case GAIN = 'GAIN';

}
