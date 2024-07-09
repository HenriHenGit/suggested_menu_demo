<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food_nutri extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function foodNutri()
    {
        return $this->hasMany(Food_nutri::class, 'food_id', 'id');
    }

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'food_id',
        'nutri_id',
        'amount',
    ];
}
