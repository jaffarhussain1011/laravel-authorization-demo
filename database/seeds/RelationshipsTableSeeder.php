<?php

use Illuminate\Database\Seeder;

class RelationshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $adminRole = App\Models\Role::where('slug', 'admin')->first();
        $userRole = App\Models\Role::where('slug', 'user')->first();
        $adminRole->permissions()->sync(App\Models\Permission::all()->lists('id')->toArray());
        $userRole->permissions()->sync(App\Models\Permission::whereIn('slug', ['permission.index','role.index'])->lists('id')->toArray());
        $admin = App\Models\User::where('email','admin@example.com')->first();
        $user = App\Models\User::where('email','user@example.com')->first();
        $admin->roles()->sync(App\Models\Role::where('slug', 'admin')->lists('id')->toArray());
        $user->roles()->sync(App\Models\Role::where('slug', 'user')->lists('id')->toArray());
    }
}
