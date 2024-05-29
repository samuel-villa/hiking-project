<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HikeController;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/hikes', [HikeController::class, 'show']);

Route::prefix('/hike')->controller(HikeController::class)->group(function () {  // prefix all routes within this parent route (idem for names)

    Route::get('/add-hike', 'show_add_hike')->name('add-hike');
    Route::post('/', 'create')->name('create');
});


require_once __DIR__.'/auth.php';
