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

Route::get('/', array(
    'as' => 'home',
    'uses' => 'SiteController@home'
));

Route::get('admin', array(
    'as' => 'admin',
    'uses' => 'SiteController@admin'
));

Route::get('admin/autores', array(
    'as' => 'autores',
    'uses' => 'SiteController@autores'
));

Route::get('admin/informes', array(
    'as' => 'informes',
    'uses' => 'SiteController@informes'
));

Route::get('admin/prestamos', array(
    'as' => 'prestamos',
    'uses' => 'SiteController@prestamos'
));

Route::get('admin/socios', array(
    'as' => 'socios',
    'uses' => 'SiteController@socios'
));

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