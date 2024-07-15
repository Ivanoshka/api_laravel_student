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
Route::get('/students/{id}', [studentController::class,'show']);

//CREAR ESTUDIANTES
Route::post('/students', [studentController::class,'store']);

//ACTUALIZANDO ESTUDIANTES, MODIFICA TODO EL REGISTRO
Route::put('/students/{id}', [studentController::class,'update']);

//ACTUALIZANDO ESTUDIANTES de forma parcial, REGISTRA SOLO UNA PARTE DEL OBJETO
Route::patch('/students/{id}', [studentController::class,'updatePartial']);

//ELIMINANDO ESTUDIANTES
Route::delete('/students/{id}', [studentController::class,'destroy']);

