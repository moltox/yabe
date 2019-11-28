<?php

use Illuminate\Database\Seeder;
use moltox\yabe\Menu;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create(['name' => 'root', 'title' => 'root', 'url' => '', 'sequence' => 0, 'active' => false, 'parent' => true, 'parent_id' => 0]);
        Menu::create(['name' => 'home', 'title' => 'yabe::words.home', 'url' => '/yabe', 'sequence' => 1]);

        Menu::create(['name' => 'user', 'title' => 'yabe::words.user', 'url' => '', 'sequence' => 2, 'parent' => true]);
        Menu::create(['name' => 'users', 'title' => 'yabe::words.user', 'url' => '/yabe/users', 'sequence' => 1, 'parent_id' => 3]);
        Menu::create(['name' => 'role', 'title' => 'yabe::words.role', 'url' => '/yabe/roles', 'sequence' => 2, 'parent_id' => 3]);
        Menu::create(['name' => 'permission', 'title' => 'yabe::words.permission', 'url' => '/yabe/permissions', 'sequence' => 3, 'parent_id' => 3]);

        Menu::create(['name' => 'cms', 'title' => 'yabe::words.cms', 'url' => '', 'sequence' => 3, 'parent' => true]);
        Menu::create(['name' => 'menu', 'title' => 'yabe::words.menu', 'url' => '/yabe/menus', 'sequence' => 1, 'parent_id' => 7]);

    }
}
