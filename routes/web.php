<?php

use App\Http\Controllers\IglesiaController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PuntajeController;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\RespuestaController;
use App\Http\Controllers\JuegoController;
use App\Http\Controllers\InformeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/iglesia',[IglesiaController::class,'index'])->name('iglesia.index');
Route::get('/iglesia/nuevo',[IglesiaController::class,'create'])->name('iglesia.create');
Route::post('/iglesia',[IglesiaController::class,'store'])->name('iglesia.store');
Route::get('/iglesia/{id}/editar',[IglesiaController::class, 'edit'])->name('iglesia.edit');
Route::put('/iglesia',[IglesiaController::class,'update'])->name('iglesia.update');
Route::delete('/iglesia/{id}',[IglesiaController::class,'destroy'])->name('iglesia.destroy');

Route::get('equipo',[EquipoController::class,'index'])->name('equipo.index');
Route::get('equipo/nuevo',[EquipoController::class,'create'])->name('equipo.create');
Route::post('equipo',[EquipoController::class,'store'])->name('equipo.store');
Route::get('equipo/{id}/editar',[EquipoController::class, 'edit'])->name('equipo.edit');
Route::put('equipo',[EquipoController::class,'update'])->name('equipo.update');
Route::delete('equipo/{id}',[EquipoController::class,'destroy'])->name('equipo.destroy');

Route::get('evento',[EventoController::class,'index'])->name('evento.index');
Route::get('evento/nuevo',[EventoController::class,'create'])->name('evento.create');
Route::post('evento',[EventoController::class,'store'])->name('evento.store');
Route::get('evento/{id}/editar',[EventoController::class, 'edit'])->name('evento.edit');
Route::put('evento',[EventoController::class,'update'])->name('evento.update');
Route::delete('evento/{id}',[EventoController::class,'destroy'])->name('evento.destroy');

Route::get('puntaje',[PuntajeController::class,'index'])->name('puntaje.index');
Route::get('puntaje/nuevo',[PuntajeController::class,'create'])->name('puntaje.create');
Route::post('puntaje',[PuntajeController::class,'store'])->name('puntaje.store');
Route::get('puntaje/{id}/editar',[PuntajeController::class, 'edit'])->name('puntaje.edit');
Route::put('puntaje',[PuntajeController::class,'update'])->name('puntaje.update');
Route::delete('puntaje/{id}',[PuntajeController::class,'destroy'])->name('puntaje.destroy');

Route::get('pregunta',[PreguntaController::class,'index'])->name('pregunta.index');
Route::get('pregunta/nuevo',[PreguntaController::class,'create'])->name('pregunta.create');
Route::post('pregunta',[PreguntaController::class,'store'])->name('pregunta.store');
Route::get('pregunta/{id}/editar',[PreguntaController::class, 'edit'])->name('pregunta.edit');
Route::put('pregunta',[PreguntaController::class,'update'])->name('pregunta.update');
Route::delete('pregunta/{id}',[PreguntaController::class,'destroy'])->name('pregunta.destroy');

Route::get('respuesta',[RespuestaController::class,'index'])->name('respuesta.index');
Route::get('respuesta/nuevo',[RespuestaController::class,'create'])->name('respuesta.create');
Route::post('respuesta',[RespuestaController::class,'store'])->name('respuesta.store');
Route::get('respuesta/{id}/editar',[RespuestaController::class, 'edit'])->name('respuesta.edit');
Route::put('respuesta',[RespuestaController::class,'update'])->name('respuesta.update');
Route::delete('respuesta/{id}',[RespuestaController::class,'destroy'])->name('respuesta.destroy');

Route::get('juego',[JuegoController::class,'index'])->name('juego.index');
Route::get('juego/reset',[JuegoController::class,'reset'])->name('juego.reset');
Route::get('juego/preguntas',[JuegoController::class,'findPreguntas'])->name('juego.findPreguntas');
Route::get('juego/equipos',[JuegoController::class,'findEquipos'])->name('juego.findEquipos');
Route::post('juego',[JuegoController::class,'store'])->name('juego.store');
Route::get('juego/{opt}/comodin',[JuegoController::class,'comodin'])->name('juego.comodin');
Route::get('juego/{p}/{e}',[JuegoController::class, 'edit'])->name('juego.edit');
Route::put('juego',[JuegoController::class,'update'])->name('juego.update');
Route::delete('juego/{id}',[JuegoController::class,'destroy'])->name('juego.destroy');

Route::get('informe',[InformeController::class,'index'])->name('informe.index');
Route::get('informe/grafico/{grafico}',[InformeController::class,'graficos'])->name('informe.grafico');
Route::get('informe/resultados',[InformeController::class,'resultados'])->name('informe.resultados');
});
