<?php


use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Auth\DriverAuthController;
use App\Http\Controllers\DashboardControllor;
use App\Http\Controllers\ScanController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::middleware('guest:web')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::prefix('users')->group(function () {
            Route::get('login', [UserAuthController::class, 'loginPage'])->name('auth.users.login');
            Route::post('login', [UserAuthController::class, 'login'])->name('auth.users.login.post');
        });
    });
});


// Guest routes for drivers (use guest:employee to check employee guard)
Route::middleware('guest:employee')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::prefix('drivers')->group(function () {
            Route::get('login', [DriverAuthController::class, 'loginPage'])->name('auth.drivers.login');
            Route::post('login', [DriverAuthController::class, 'login'])->name('auth.drivers.login.post');
        });
    });
});


Route::middleware('user')->group(function () {
    Route::get('/', [SearchController::class, 'index'])->name('search.form');
    Route::get('/search/result', [SearchController::class, 'search'])->name('search');
    Route::get('/routes/all', [SearchController::class, 'allRoutes'])->name('routes.all');
    Route::get('/places', [PlaceController::class, 'index'])->name('places.index');
    Route::post('/auth/users/logout', [UserAuthController::class, 'logout'])->name('auth.users.logout');
    Route::get('/seat', [SeatController::class, 'seat'])->name('seat');
    

    Route::get('/scan', [ScanController::class, 'scan'])->name('scan');
    Route::get('/scan/cancel', [ScanController::class, 'cancel'])->name('cancel');
    Route::get('/scan/success', [ScanController::class, 'success'])->name('success');
    Route::get('/scan/confirm', [ScanController::class, 'confirm'])->name('confirm');

    Route::get('/drivers/schedule', [DashboardControllor::class, 'index'])->name('drivers.schedule');
    Route::post('/drivers/schedule/{id}/receive', [DashboardControllor::class, 'receiveJob'])->name('drivers.receive');
});

// Protected driver test page to verify auth:employee middleware
Route::middleware('auth:employee')->group(function () {
    Route::get('/drivers/test', [DriverAuthController::class, 'test'])->name('drivers.test');
    Route::post('/auth/drivers/logout', [DriverAuthController::class, 'logout'])->name('auth.drivers.logout');
});
