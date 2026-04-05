<?php

use App\Http\Controllers\PlaylistController;
use App\Models\Playlist;
use Illuminate\Support\Facades\Route;


    Route::get('/', [PlaylistController::class, 'index'])->name('playlists.index');
    Route::post('/generate-courses', [PlaylistController::class, 'generateCourses'])->name('playlists.generate');
