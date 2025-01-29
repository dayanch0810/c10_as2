<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class League extends Model
{

    protected $guarded = [
        'id',
    ];

    public $timestamps = false;


    public function clubs(): HasMany
    {
        return $this->hasMany(Club::class);
    }

    public function matches(): HasMany
    {
        return $this->hasMany(Matches::class);
    }

    public function leagueUser(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'league_user');
    }
}
