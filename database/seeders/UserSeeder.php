<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@library.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Test User',
            'email' => 'user@library.com',
            'password' => Hash::make('password'),
        ]);
    }
}