<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    use HasFactory;

    protected $table = 'user_permissions';
    protected $primaryKey = 'id';

    public function check_permissions($vals, $permissions) {

        $result = [];

        foreach ( $vals as $val ) {
            $result[$val] = 0;
            if ( in_array($val, $permissions ) ) {
                $result[$val] = 1;
            }
        }

        return $result;

    }
    
}
