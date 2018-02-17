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

Route::get('/', function () {
    return view('index');
});

Route::get('admin', function(){
    return view('admin');
});

Route::get('admin/prestamos', function(){
    return view('prestamos');
});

Route::get('admin/socios', function(){
    return view('socios');
});

Route::get('admin/informes', function(){
    return view('informes');
});

Route::get('admin/autores', function(){
   return view('autores');
});

Route::get('admin/', function(){
    return view('');
});

Route::get('registro', function(){
    return view('registro');
});

Route::any('ingreso/login', array(
    'as' => 'ingreso.login',
    'uses' => 'IngresoController@login'
));

/*  Rutas del site  */
Route::get('site/libros', array(
    'as' => 'site.libros',
    'uses' => 'SiteController@libros'
));

Route::get('site/contacto', array(
    'as' => 'site.contacto',
    'uses' => 'SiteController@contacto'
));

Route::post('site/process-contacto', array(
    'as' => 'site.process.contacto',
    'uses' => 'SiteController@emailContactoSite'
));