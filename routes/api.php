<?php

use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TechController;
use Illuminate\Support\Facades\Route;

Route::get('/certificates', [CertificateController::class, 'index']);
Route::get('/certificates/{id}', [CertificateController::class, 'show']);

Route::get('/teches', [TechController::class, 'index']);
Route::get('/teches/{id}', [TechController::class, 'show']);

Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{id}', [ProjectController::class, 'show']);

Route::get('/experiences', [ExperienceController::class, 'index']);
Route::get('/experiences/{id}', [ExperienceController::class, 'show']);

Route::get('/profiles', [ProfileController::class, 'index']);
Route::get('/profiles/{id}', [ProfileController::class, 'show']);
