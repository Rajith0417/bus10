<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DistrictController;
use App\Http\Controllers\RoadController;
use App\Http\Controllers\WaypointController;
use App\Http\Controllers\DistanceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route::get('/xxx', [DistrictController::class, 'index'])->name('district.index');
// Route::post('/district', [DistrictController::class, 'store'])->name('district.store');
// Route::put('/district/{id}', [DistrictController::class, 'update'])->name('district.update');
// Route::delete('/district/{id}', [DistrictController::class, 'destroy'])->name('district.destroy');

Route::middleware(['auth'])->group(function () {
    Route::resource('districts', DistrictController::class);
    Route::resource('roads', RoadController::class);
    Route::resource('waypoints', WaypointController::class);

    Route::get('/districtWaypoints/{id}', [WaypointController::class, 'test']);
});

