<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Defino el primer usuario en migracion
        App\User::create([
            'name'=>'Jhonny',
            'email'=>'jhonny@gmail.com',
            'password'=>bcrypt('12345678')
        ]);
    }
}
