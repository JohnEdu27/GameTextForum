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
        foreach (['gamer', 'grandmaster'] as $role) {
        User::factory()->create([
        'email' => "$role@gtf.test",
        'role' => $role,
        ]);
        }
    }
}
