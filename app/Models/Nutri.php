<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nutri extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'unit',
        'desc',
    ];

    // Khóa chính không phải là tự tăng
    public $incrementing = false;

    // Kiểu của khóa chính là string
    protected $keyType = 'string';
}
