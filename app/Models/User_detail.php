<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User_detail extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $table = 'user_details';

    protected $primaryKey = ['user_id', 'nutri_id'];
    public $incrementing = false;
    protected $fillable = ['user_id', 'nutri_id', 'amount', 'status'];

    public $timestamps = true;


    use SoftDeletes;
    protected $dates = ['deleted_at'];


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
