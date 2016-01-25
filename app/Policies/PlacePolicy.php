<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class PlacePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    /**
     * Determine if the given place can be updated by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Place  $post
     * @return bool
     */
    public function update(\App\User  $user, \App\Models\Place $post)
    {
        return $user->email === 'jaffarhussain1011@gmail.com';
    }
}
