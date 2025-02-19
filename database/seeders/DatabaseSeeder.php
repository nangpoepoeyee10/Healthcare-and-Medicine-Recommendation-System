<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $user1 = User::create([
            'name' => 'poepoe',
            'email' => 'nangpoepoeyee10@gmail.com',
            'password' => Hash::make('Poepoe123'),
            'role' => 'admin',
        ]);

        $user2 = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('User@123'),
            'role' => 'user',
        ]);
    }
}
