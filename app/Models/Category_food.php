<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_food extends Model
{
    use HasFactory;
    // Khóa chính không phải là tự tăng
    public $incrementing = false;

    // Kiểu của khóa chính là string
    protected $keyType = 'string';
}
