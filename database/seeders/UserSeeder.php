<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{
    User,
    Role,
    Permission
};

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            ['name'=>'user','email'=>'user@gmail.com','password'=>bcrypt('password')],
            ['name'=>'Editor','email'=>'editor@gmail.com','password'=>bcrypt('password')],
            ['name'=>'Author','email'=>'author@gmail.com','password'=>bcrypt('password')],
        ]);

        Role::insert([
            ['name'=>'Editor','slug'=>'editor'],
            ['name'=>'Author','slug'=>'author'],
        ]);

    }
}
