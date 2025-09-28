<?php

use App\Http\Controllers\ControllerHome;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceController;

Route::get('/', [ControllerHome::class,'index']);
Route::get('/search', [SearchController::class, 'index'])->name('search.form');
Route::get('/search/result', [SearchController::class, 'search'])->name('search');
Route::get('/routes/all', [SearchController::class, 'allRoutes'])->name('routes.all');


Route::get('/places', [PlaceController::class, 'index'])->name('places.index');