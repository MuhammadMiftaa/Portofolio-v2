<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Landing');
});

Route::get('/test', function () {
    return response()->json(['message' => 'Hello World']);
});