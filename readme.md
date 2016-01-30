## Steps to install
Clone this repo
Run 
composer update
Adjust your db settings
Run
php artisan migrate
php artisan db:seed

Default seeded users:
admin@example.com
secret
user@example.com
secret

Default seeded roles:
admin
user

Default seeded user permissions:

'title' => 'List Permissions',
'slug' => 'permission.index',
        
'title' => 'Create Permission',
'slug' => 'permission.create',
        
'title' => 'Update Permission',
'slug' => 'permission.update',
        
'title' => 'Delete Permission',
'slug' => 'permission.destroy',
        
'title' => 'List Roles',
'slug' => 'role.index',
        
'title' => 'Create Role',
'slug' => 'role.create',
        
'title' => 'Update Role',
'slug' => 'role.update',
      
'title' => 'Delete Role',
'slug' => 'role.destroy',

### License

Open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
