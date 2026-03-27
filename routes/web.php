<?php

use App\Http\Controllers\EstudianteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Ruta adicional (por si la necesitas)
Route::get('/bienvenida', function () {
    return view('bienvenida');
});

// CRUD de estudiantes (7 rutas automáticas)
Route::resource('estudiantes', EstudianteController::class);
