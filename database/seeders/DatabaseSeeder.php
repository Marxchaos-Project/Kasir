<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
{
    // Data user dengan role
    \App\Models\User::create([
        'name' => 'Admin User',
        'email' => 'admin@example.com',
        'password' => Hash::make('password'),
        'role' => 'admin', 
    ]);

    \App\Models\User::create([
        'name' => 'Petugas User',
        'email' => 'petugas@example.com',
        'password' => Hash::make('password'),
        'role' => 'petugas',
    ]);
}

}
