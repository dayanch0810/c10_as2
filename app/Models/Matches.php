<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Matches extends Model
{
    /** @use HasFactory<\Database\Factories\MatchesFactory> */
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public $timestamps = false;

    public function league(): BelongsTo
    {
        return $this->belongsTo(League::class);
    }

    public function clubs(): HasMany
    {
        return $this->hasMany(Club::class);
    }
}
