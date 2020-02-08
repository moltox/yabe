Yabe 0.2

composer require moltox/yabe

in config/app.php
moltox\yabe\YabeServiceProvider::class,
in container
composer dump-autoload
php artisan vendor:publish

Ensure to have at least three users before seeding:

$this->call( moltox\yabe\Database\seeds\MenusTableSeeder::class );
        $this->call( moltox\yabe\Database\seeds\PermissionsAndRolesSeeder::class );
        
        
        
        Add
           use HasRoles;
           to User Model
