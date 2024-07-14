<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\studentController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//MOSTRAR ESTUDIANTES
Route::get('/students', [studentController::class, 'index']);


//MOSTRAR UN ESTUDIANTE
Route::get('/students/{id}', function () {
    return 'Obteniendo un estudiante ';
});

//CREAR ESTUDIANTES
Route::post('/students', function () {
    return 'Creando Estudiantes: ';
});

//ACTUALIZANDO ESTUDIANTES
Route::put('/students/{id}', function ($id) {
    return 'Actualizando estudiantes';
});

//ELIMINANDO ESTUDIANTES
Route::delete('/students/{id}', function ($id) {
    return 'Eliminando estudiantes';
});

