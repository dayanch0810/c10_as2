<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)
    ->group(function () {
        Route::get('', 'index')->name('home');

        Route::get('league/{slug}', 'league')
            ->where('slug', '[a-z0-9-]+')->name('league');

        Route::get('club/{slug}', 'club')
            ->where('slug', '[a-z0-9-]+')->name('club');

        Route::get('user/{id}', 'user')
            ->where('id', '[0-9]+')->name('user');

        Route::get('player/{id}', 'player')
            ->where('id', '[0-9]+')->name('player');

        Route::get('matches/{id}', 'matches')
            ->where('id', '[0-9]+')->name('matches');
});
