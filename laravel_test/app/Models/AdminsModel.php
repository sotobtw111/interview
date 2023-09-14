<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\Authenticatable;

class AdminsModel extends Model implements Authenticatable
{
    use HasFactory;
    protected $table = 'admins';
    protected $primaryKey = 'id';  

    public function getAuthIdentifierName() {
        return 'email'; // 返回用於識別用戶的名稱字段名
    }
    public function getAuthIdentifier() {
        return $this->email; // 返回用戶的識別值，通常是用戶的唯一標識
    }
    public function getAuthPassword() {
        return $this->password; // 返回用戶的加密密碼
    }
    public function getRememberToken() {}
    public function setRememberToken($value) {}
    public function getRememberTokenName() {}
}
