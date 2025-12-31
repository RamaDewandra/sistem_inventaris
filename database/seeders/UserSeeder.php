<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => 'admin1234',
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => 'user1234',
            'role' => 'user'
        ]);
    }
}
