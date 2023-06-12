<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/proyecto', function () {
//    return view('proyecto.index');
//});
//Para acceder al formulario de creacion de proyecto
Route::get('/proyecto',[App\Http\Controllers\ProyectosController::class, 'index']);
Route::get('/proyecto/create',[App\Http\Controllers\ProyectosController::class, 'create']);
Route::get('/proyecto/{proyecto}/edit',[App\Http\Controllers\ProyectosController::class, 'edit']);
//Route::get('/proyecto/create',[App\Http\Controllers\ProyectosController::class, 'create']);
Route::get('/proyecto/form',[App\Http\Controllers\ProyectosController::class, 'form']);
Route::post('/proyecto/almacenar',[App\Http\Controllers\ProyectosController::class, 'store']);
Route::delete('/proyecto/eliminar/{proyecto}',[App\Http\Controllers\ProyectosController::class, 'destroy']);
//Route::put('/proyecto/actualizar/{proyecto}',[App\Http\Controllers\ProyectosController::class, 'update']);
Route::patch('/proyecto/actualizar/{proyecto}',[App\Http\Controllers\ProyectosController::class, 'update']);


//Route::resource('proyecto', ProyectosController::class);



Auth::routes();

Route::get('/home', [ProyectosController::class, 'index'])->name('home');

Route::get('/proyecto/pdf', [ProyectosController::class, 'getPDF'])->name('proyecto.pdf');


