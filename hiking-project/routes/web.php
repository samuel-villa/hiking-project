<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/home', [HikeController::class, 'show'])->name('home');
Route::get('/filterHikes', [HikeController::class, 'filter'])->name('filter');
Route::get('/clearFilterHikes', [HikeController::class, 'clearFilters'])->name('clearFilters');
//Route::get('/users', [ProfileController::class, 'getUsers'])->name('getUsers');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');


Route::prefix('/hike')->controller(HikeController::class)->group(function () {  // prefix all routes within this parent route (idem for names)
    Route::get('/add-hike', 'show_add_hike')->name('add-hike');
    Route::get('/{id}', 'show_hike')->name('show-hike');
    Route::get('/{id}/edit', 'show_edit_hike')->name('show-edit-hike');

    Route::post('/{id}/edit', 'edit')->name('edit');
    Route::post('/', 'create')->name('create');
    Route::post('/{id}/delete', 'delete')->name('delete-hike');
});


require_once __DIR__.'/auth.php';
