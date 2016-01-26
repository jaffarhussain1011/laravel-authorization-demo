<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
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
     * Determine if user is admin then bypass all checks
     *
     * @param  \App\User  $user
     * @param  \App\Model\Permission  $permission
     * @return bool
     */
    public function before($user, $ability) {
        if ($user->hasRole('admin')) {
            return true;
        }
    }

    /**
     * Determine if user can list permissions
     *
     * @param  \App\User  $user
     * @return bool
     */
    public function index(\App\Models\User $user, \App\Models\Permission $permission)
    {
        return $user->hasPermission('permission.index');
    }
    /**
     * Determine if the given permission can be created by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Permission  $permission
     * @return bool
     */
    public function create(\App\Models\User $user, \App\Models\Permission $permission)
    {
        return $user->hasPermission('permission.create');
    }
    /**
     * Determine if the given permission can be updated by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Permission  $permission
     * @return bool
     */
    public function update(\App\Models\User $user, \App\Models\Permission $permission)
    {
        return $user->hasPermission('permission.update');
    }
    /**
     * Determine if the given permission can be destroyed by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Permission  $permission
     * @return bool
     */
    public function destroy(\App\Models\User $user, \App\Models\Permission $permission)
    {
        return $user->hasPermission('permission.destroy');
    }
}
