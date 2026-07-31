<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Standard User
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@foundida.com',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);

        // Seed Admin User
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@foundida.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        $this->call([
            SubscriptionPlanSeeder::class,
            PackageSeeder::class,
            ServiceSeeder::class,
            PostSeeder::class,
        ]);
    }
}
