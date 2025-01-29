<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Club extends Model
{
    /** @use HasFactory<\Database\Factories\ClubFactory> */
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public $timestamps = false;

    public function league(): BelongsTo
    {
        return $this->belongsTo(League::class);
    }


    public function matches(): BelongsTo
    {
        return $this->belongsTo(Matches::class);
    }

    public function players(): HasMany
    {
        return $this->hasMany(Player::class);
    }

    public function clubUser(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'club_user');
    }
}
