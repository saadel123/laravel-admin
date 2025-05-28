<?php

use Illuminate\Support\Facades\Route;


Route::prefix('admin')
    ->as('admin.')
    ->group(function () {
        require base_path('routes/admin.php');
    });

Route::get('/', function () {
    return view('welcome');
});
