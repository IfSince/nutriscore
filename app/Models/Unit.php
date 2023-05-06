<?php

namespace App\Models;

enum Unit: string {
    // weight
    case KILOGRAM = 'KILOGRAM';
    case GRAM = 'GRAM';

    // height
    case METER = 'METER';
    case CENTIMETER = 'CENTIMETER';

    case MILLILITER = 'MILLILITER';
    case LITER = 'LITER';
}
