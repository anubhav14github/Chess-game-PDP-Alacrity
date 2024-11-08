<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Player;
use App\Models\Tournament;
use App\Models\Game;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            // PlayerSeeder::class,
            UserSeeder::class,
            TournamentSeeder::class,
            GameSeeder::class,
        ]);
    }
}
