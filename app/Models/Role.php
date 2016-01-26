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
        return $this->belongsToMany('App\Models\User')->withTimestamps();
    }
    public function permissions(){
        return $this->belongsToMany('App\Models\Permission')->withTimestamps();
    }
}
