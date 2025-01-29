<?php

namespace Database\Factories;

use App\Models\Club;
use App\Models\League;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Club>
 */
class ClubFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $league = League::inRandomOrder()->first();

        return [
            'league_id' => $league->id,
            'name' => fake()->city(),
            'slug' => str()->random(5),
        ];
    }


    public function configure(): static
    {
        return $this->afterMaking(function (Club $club) {
            //
        })->afterCreating(function (Club $club) {
            $club->slug = str($club->name)->slug();
            $club->update();
        });
    }
}
