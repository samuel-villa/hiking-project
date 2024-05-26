<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

# !!! Test connection to DB OK !!!
Route::get('/test-db', function () {
    $data = DB::table('Users')->get(); // Replace 'your_table_name' with your actual table name
    return dump($data); // Dump the data
});