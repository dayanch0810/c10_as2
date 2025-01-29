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

    public function favorites()
    {
        $user = User::inRandomOrder();

        $leagueIds = League::inRandomOrder()
            ->take(3)
            ->get();
        foreach ($leagueIds as $league) {
            $user->userLeague()->syncWithoutDetaching($league->id);
        }

        $clubIds = Club::inRandomOrder()
            ->take(3)
            ->get();
        foreach ($clubIds as $club) {
            $user->userClub()->syncWithoutDetaching($club->id);
        }


        $playerIds = Player::inRandomOrder()
            ->take(3)
            ->get();
        foreach ($playerIds as $player) {
            $user->userPlayer()->syncWithoutDetaching($player->id);
        }

        return view('home.index', [
            'userLeagues' => $user->userLeague,
            'userClubs' => $user->userClub,
            'userPlayers' => $user->userPlayer,
        ]);
    }

    public function league($slug)
    {
        $league = League::firstWhere('slug', $slug);

        $club = Club::where('league_id', $league->id)
            ->withCount('matches', 'players')
            ->orderBy('name')
            ->paginate(12)
            ->get();

        return view('home.league')
            ->with([
                'league' => $league,
                'club' => $club,
            ]);    }
}
