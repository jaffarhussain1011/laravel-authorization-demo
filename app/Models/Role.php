<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
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
    public function users(){
        return $this->hasMany('App\Models\User');
    }
    public function permissions(){
        return $this->hasMany('App\Models\Permission');
    }
}
