<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([[
            'title' => 'Admin',
            'slug' => 'admin',
        ],[
            'title' => 'User',
            'slug' => 'user',
        ]]);
        
    }
}
