<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name' => 'moltox', 'email' => 'mueller@media-it-services.de', 'password' => Hash::make('123qwe'),]);

        factory(App\User::class, 235)->create();
    }
}
