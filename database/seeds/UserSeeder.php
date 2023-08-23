<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{/**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();

        $users =  [
            [

              'name' => 'admin',
              'email' => 'admin@admin.com',
              'password' => '$2y$10$grppXeTTYJqDO7nTO6eHaeSUdtmNIl2d/v/ZwSEs9.8RCww1ILOSu',
              'email_verified_at' => now(),
              'remember_token' => Str::random(10)
             
            ]
        ];

        User::insert($users);
    }
}

