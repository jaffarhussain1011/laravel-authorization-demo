<?php

namespace App\Models;

use App\User as BaseUserClass;

class User extends BaseUserClass {

    public function hasRole($slug) {
        return in_array($slug, $this->roles()->lists('slug', 'id')->toArray());
    }

    public function hasPermission($slug) {
        $return = false;
        foreach ($this->roles as $role) {
            if (in_array($slug, $role->permissions()->lists('slug', 'id')->toArray())) {
                $return = true;
            }
        }
        return $return;
    }

    /*
     * relationships
     */

    public function roles() {
        return $this->belongsToMany('App\Models\Role')->withTimestamps();
    }

}
