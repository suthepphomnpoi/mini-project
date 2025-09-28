<?php

use App\Http\Controllers\ControllerHome;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ControllerHome::class,'index']);
Route::get('/search', [SearchController::class, 'index'])->name('search.form');
Route::get('/search/result', [SearchController::class, 'search'])->name('search');
Route::get('/routes', [SearchController::class, 'allRoutes'])->name('routes.all');