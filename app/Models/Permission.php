<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','slug'];
    /*
     * relationships
     */
    public function roles(){
        return $this->hasMany('App\Models\Role');
    }
}
