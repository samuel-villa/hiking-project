<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    //return view('welcome');

    $hike = new \App\Models\Hike();
    $hike->name = 'Cascade de Chanxhe';
    $hike->distance = '11.38km';
    $hike->duration = '3h';
    $hike->elevation_gain = '318m';
    $hike->description = "Très belle promenade au départ de Chanxhe passant par Fays, La Haze, Lincé et les cascades de Chanxhe.
Le parcours est très varié : bois, prairies, petites routes, chemins, sentiers.
Le point fort de la promenade ce sont les cascades, il y en a 2 à moins de 200m l'une de l'autre.
Attention : récemment on a barré le chemin d'accès aux cascades avec un câble et un panneau propriété privée mais vous pouvez sauter par dessus sans problème.";
    $hike->user_id = 1;
    $hike->save();

    return $hike;
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
