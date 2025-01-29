<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\League;
use App\Models\Matches;
use App\Models\Player;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $leagues = League::orderBy('id')
            ->withCount('matches', 'clubs')
            ->get();

        $clubs = Club::inRandomOrder()
            ->withCount('players')
            ->take(5)
            ->get();

        $matches = Matches::orderBy('league_id')
            ->get();

        return view('home.index')
            ->with([
                'leagues' => $leagues,
                'clubs' => $clubs,
                'matches' => $matches,
            ]);
    }

    public function league($slug)
    {
        $league = League::firstWhere('slug', $slug);

        $club = Club::where('league_id', $league->id)
            ->withCount('players')
            ->orderBy('name')
            ->paginate(12);

        return view('home.league')
            ->with([
                'league' => $league,
                'club' => $club,
            ]);
    }

    public function club($slug)
    {
        $club = Club::firstWhere('slug', $slug);

        $matches = Matches::where('club_id_1', $club->id)
            ->orderBy('id')
            ->paginate(12);

        return view('home.club')
            ->with([
                'club' => $club,
                'matches' => $matches,
            ]);
    }
}
