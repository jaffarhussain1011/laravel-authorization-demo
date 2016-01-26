<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([[
            'title' => 'List Permissions',
            'slug' => 'permission.index',
        ],[
            'title' => 'Create Permission',
            'slug' => 'permission.create',
        ],[
            'title' => 'Update Permission',
            'slug' => 'permission.update',
        ],[
            'title' => 'Delete Permission',
            'slug' => 'permission.destroy',
        ],[
            'title' => 'List Roles',
            'slug' => 'role.index',
        ],[
            'title' => 'Create Role',
            'slug' => 'role.create',
        ],[
            'title' => 'Update Role',
            'slug' => 'role.update',
        ],[
            'title' => 'Delete Role',
            'slug' => 'role.destroy',
        ]]);
    }
}
