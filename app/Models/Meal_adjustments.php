<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal_adjustments extends Model
{
    use HasFactory;

    protected $fillable = [
        'timesFind',
        'toleranceMeal',
        'meals_per_day',
    ];
}
