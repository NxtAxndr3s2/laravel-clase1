<?php

use Illuminate\Support\Facades\Route;

Route::get('/bienvenida', function () {
    return view('welcome');
});
