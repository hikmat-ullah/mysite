<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\User;
use App\Role;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        $categories = [

            'Technology',
            'Engineering',
            'Government',
            'Medical',
            'Construction',
            'Software',
            'Education',
            'Sports'

        ];
        foreach($categories as $category){
            Category::create(['name'=>$category]);
        }

        Role::truncate();
        $adminRole = Role::create(['name'=>'admin']);

        $admin = User::create([
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('123admin'),
            'email_verified_at'=>NOW()
        ]);

        $admin->roles()->attach($adminRole);

       }
}
