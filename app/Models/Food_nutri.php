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

    protected $table = 'food_nutris';

    protected $primaryKey = ['food_id', 'nutri_id'];

    public $incrementing = false;

    public $timestamps = true;


    protected function setKeysForSaveQuery($query)
    {
        $keys = $this->getKeyName();
        if (!is_array($keys)) {
            return parent::setKeysForSaveQuery($query);
        }

        foreach ($keys as $keyName) {
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }

        return $query;
    }

    protected function getKeyForSaveQuery($keyName = null)
    {
        if (is_null($keyName)) {
            $keyName = $this->getKeyName();
        }

        return $this->original[$keyName] ?? $this->getAttribute($keyName);
    }
}
