<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $user = auth()->user();


    return \Inertia\Inertia::render('User/Show', [
        'user' => $user
    ]);
});
