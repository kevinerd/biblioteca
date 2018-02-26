<?php

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
Route::get('admin', array(
    'as' => 'admin',
    'uses' => 'SiteController@admin'
));

Route::get('admin/autores', array(
    'as' => 'autores',
    'uses' => 'AutoresController@autores'
));

Route::get('admin/informes', array(
    'as' => 'informes',
    'uses' => 'SiteController@informes'
));

Route::get('admin/prestamos', array(
    'as' => 'prestamos',
    'uses' => 'PrestamosController@prestamos'
));

Route::get('admin/socios', array(
    'as' => 'socios',
    'uses' => 'SociosController@socios'
));

/*Route::any('ingreso/login', array(
    'as' => 'ingreso.login',
    'uses' => 'IngresoController@login'
));*/

/*  Rutas del site  */
Route::get('site/', array(
    'as' => 'site.home',
    'uses' => 'SiteController@home'
));

Route::get('site/libros', array(
    'as' => 'site.libros',
    'uses' => 'LibrosController@libros'
));

Route::resource('mensajes', 'MensajesController');