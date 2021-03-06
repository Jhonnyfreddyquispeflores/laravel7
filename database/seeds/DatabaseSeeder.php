<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UserSeeder::class);
        //Llenar datos en las tablas
        $this->call(UsersTableSeeder::class);
        factory(App\User::class, 50)->create();
        factory(App\Post::class, 300)->create();
    }
}
