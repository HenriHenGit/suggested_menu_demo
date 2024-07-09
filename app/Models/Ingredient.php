<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ingredient extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'category_ingre_id',
        'status',
    ];

    public function categoryIngre(): BelongsTo
    {
        return $this->belongsTo(Category_ingre::class, 'category_ingre_id', 'id');
    }
}
