<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; 



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
  public function run()
{
    User::create([
        'name' => 'Admin User',
        'email' => 'admin@example.com',
        'password' => Hash::make('password123'),
        'is_admin' => true,
    ]);

    User::create([
        'name' => 'Normal User',
        'email' => 'user@example.com',
        'password' => Hash::make('password123'),
        'is_admin' => false,
    ]);
}
}
