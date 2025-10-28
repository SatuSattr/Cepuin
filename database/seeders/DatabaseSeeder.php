<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin default
        User::create([
            'name' => 'Admin Perpustakaan',
            'email' => 'admin@library.com',
            'password' => Hash::make('admin123'), // bisa diganti password-nya
            'role' => 'admin',
        ]);
    }
}

