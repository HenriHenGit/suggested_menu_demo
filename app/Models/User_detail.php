<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User_detail extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $table = 'user_details'; // tên bảng trong database

    protected $primaryKey = ['user_id', 'nutri_id']; // khóa chính là cặp user_id và nutri_id
    public $incrementing = false; // không tự động tăng

    protected $fillable = ['user_id', 'nutri_id', 'amount', 'status']; // các cột có thể được gán

    public $timestamps = true; // nếu bạn sử dụng timestamps

    // nếu sử dụng softDeletes
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    // nếu bạn cần
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
