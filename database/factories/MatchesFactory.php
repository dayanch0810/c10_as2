<?php

namespace Database\Factories;

use App\Models\Club;
use App\Models\League;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Matches>
 */
class MatchesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $league = League::inRandomOrder()->first();
        $club_id_1 = Club::where('league_id', $league->id)->inRandomOrder()->first();
        $club_id_2 = Club::where('league_id', $league->id)->where('id', '!=', $club_id_1->id)->inRandomOrder()->first()->id;
        return [
            'league_id' => $league->id,
            'club_id_1' => $club_id_1,
            'club_id_2' => $club_id_2,
            'match_date' => Carbon::now()->addHours(fake()->numberBetween(1, 12))->startOfHour(),
        ];
    }
}
