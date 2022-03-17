<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(5)->create();
         \App\Models\Task::factory(5)->create();

         User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('testadmin'),
            'firstName' => 'admin',
            'class' =>'A5',
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('testuser'),
            'firstName' => 'user',
            'class' =>'A2' ,
            'role' => 'user'
        ]);
    }
}
