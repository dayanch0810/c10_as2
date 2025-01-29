<?php

namespace Database\Seeders;

use App\Models\Club;
use App\Models\Matches;
use App\Models\Player;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LeagueSeeder::class,
        ]);

        User::factory(50)
            ->create();

        $player_count = fake()->numberBetween(18, 24);
        Club::factory(50)
            ->has(Player::factory()->count($player_count))
            ->create();

        Matches::factory(25)
            ->create();
    }
}
