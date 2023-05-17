<?php

namespace App\Models\Enums;

enum TimeOfDay: string {
    case BREAKFAST = 'BREAKFAST';
    case LUNCH = 'LUNCH';
    case DINNER = 'DINNER';
    case SNACKS = 'SNACKS';
}
