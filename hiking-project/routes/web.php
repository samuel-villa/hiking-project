<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

# !!! Test connection to DB OK !!!
// Route::get('/test-db', function () {
//     $data = DB::table('Users')->get();
//     return dump($data);
// });

Route::get('/subscribe', function () {
    return 'subscribe';
});

Route::get('/login', [UserController::class, 'login']);

Route::get('/profile', function () {
    return 'profile';
});

Route::get('/profile/hikes', function () {
    return 'profile/{profile_name}/hikes';
});

Route::get('/profile/starred', function () {
    return 'profile/{profile_name}/starred';
});

Route::get('/hike', function () {
    return 'hike-{hike-slug}';
});

Route::get('/edit-hike', function () {
    return 'hike-{hike-slug}/edit';
});

Route::get('/delete-hike', function () {
    return 'hike-{hike-slug}/delete';
});
