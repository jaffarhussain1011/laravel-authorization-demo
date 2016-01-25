<?php

namespace App\Models;

use App\User as BaseUserClass;

class User extends BaseUserClass
{
    /*
     * relationships
     */
    public function roles(){
        return $this->hasMany('App\Models\Role');
    }
}
