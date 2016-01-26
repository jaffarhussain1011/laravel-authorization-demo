<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy {

    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Determine if user is admin then bypass all checks
     *
     * @param  \App\User  $user
     * @param  \App\Model\Role  $role
     * @return bool
     */
    public function before($user, $ability) {
//        if ($user->hasRole('admin')) {
//            return true;
//        }
    }

    /**
     * Determine if user can list roles
     *
     * @param  \App\User  $user
     * @return bool
     */
    public function index(\App\Models\User $user, \App\Models\Role $role) {
        return $user->hasPermission('role.index');
    }

    /**
     * Determine if the given role can be created by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Role  $role
     * @return bool
     */
    public function create(\App\Models\User $user, \App\Models\Role $role) {
        return $user->hasPermission('role.create');
    }

    /**
     * Determine if the given role can be updated by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Role  $role
     * @return bool
     */
    public function update(\App\Models\User $user, \App\Models\Role $role) {
        return $user->hasPermission('role.update');
    }

    /**
     * Determine if the given role can be destroyed by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Role  $role
     * @return bool
     */
    public function destroy(\App\Models\User $user, \App\Models\Role $role) {
        return $user->hasPermission('role.destroy');
    }

}
