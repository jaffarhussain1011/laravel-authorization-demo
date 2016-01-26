<?php

namespace App\Models;

use App\User as BaseUserClass;

class User extends BaseUserClass {

    public function hasRole($slug) {
        return in_array($slug, $this->roles()->lists('slug', 'id')->toArray());
    }

    public function hasPermission($slug) {
        $return = false;
        $roles = $this->load('roles.permissions')->roles;
        foreach ($roles as $role) {
            if ($return) {
                break;
            }
            if ($role->slug == $slug) {
                $return = true;
                break;
            }
            foreach ($role->permissions as $permission) {
                if ($permission->slug == $slug) {
                    $return = true;
                    break;
                }
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
