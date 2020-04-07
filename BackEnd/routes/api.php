<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('autores', 'Autor\AutorController');
Route::resource('eventos', 'Evento\EventoController');
Route::resource('grupos_autores', 'GrupoAutor\GrupoAutorController');
Route::resource('grupos_eventos', 'GrupoEvento\GrupoEventoController');
Route::resource('grupos_libros', 'GrupoLibro\GrupoLibroController');
Route::resource('grupos_talleres', 'GrupoTaller\GrupoTallerController');
Route::resource('libros', 'Libro\LibroController');
Route::resource('prestamos', 'Prestamo\PrestamoController');
Route::resource('profesores', 'Profesor\ProfesorController');
Route::resource('talleres', 'Taller\TallerController');
Route::resource('users', 'User\UserController');
