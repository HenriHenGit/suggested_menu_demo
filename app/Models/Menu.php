<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'food_id',
        'meal',
        'status',
    ];

    protected $table = 'menus';

    protected $primaryKey = ['user_id', 'food_id'];
    public $incrementing = false;


    public $timestamps = true;
}
