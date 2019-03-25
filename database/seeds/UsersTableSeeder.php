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
        \App\User::create([
            'name' => 'Romi Alief Rahman',
            'email' => 'romi@aliefrahman.com',
            'password' => bcrypt('rahasia'),
            'status' => true
        ]);
    }
}
