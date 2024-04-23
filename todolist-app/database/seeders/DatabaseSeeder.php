<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' =>'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('1234'),
            'role' => 'admin'
        ]);
    }
}
