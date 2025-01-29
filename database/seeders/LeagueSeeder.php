<?php

namespace Database\Seeders;

use App\Models\League;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeagueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objs = [
            'Premier League',
            'Laliga',
            'Serie A',
            'Bundesliga',
            'Ligue 1'
            ];

        foreach ($objs as $obj) {
            $league = League::create([
                'name' => $obj,
                'slug' => str()->random(5),
            ]);
            $league->slug = str($league->name)->slug();
            $league->update();
        }

    }
}
