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

Route::resource('admin/mensajes', 'MensajesController');

Route::resource('admin/autores', 'AutoresController');

Route::resource('admin/informes', 'InformesController');

Route::resource('admin/socios', 'SociosController');

Route::resource('admin/usuarios', 'UsuariosController');

Route::resource('admin/prestamos', 'PrestamosController');

Route::resource('admin/libros', 'LibrosController');

Route::get('admin', array(
    'as' => 'admin',
    'uses' => 'SiteController@admin'
));

Route::get('ingreso/login', array(
    'as' => 'ingreso.login',
    'uses' => 'Auth\LoginController@showLoginForm'
));

Route::post('ingreso/login', array(
    'as' => 'login',
    'uses' => 'Auth\LoginController@login'
));

Route::post('sesion/logout', array(
    'as' => 'sesion.logout',
    'uses' => 'Auth\LoginController@logout'
));

Route::get('registro', array(
    'as' => 'registro',
    'uses' => 'Auth\RegisterController@showRegistrationForm'
));

Route::post('registro', array(
    'as' => 'registro',
    'uses' => 'Auth\RegisterController@register'
));

Route::get('password/reset', array(
    'as' => 'password.request',
    'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
));

Route::post('password/email', array(
    'as' => 'password.email',
    'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
));

Route::get('password/reset/{token}', array(
    'as' => 'password.reset',
    'uses' => 'Auth\ResetPasswordController@showResetForm'
));

Route::post('password/reset', array(
    'as' => 'password.reset',
    'uses' => 'Auth\ResetPasswordController@reset'
));

Route::get('/home', 'HomeController@index')->name('home');

/*  Rutas del site  */
Route::get('/', array(
    'as' => 'site.home',
    'uses' => 'SiteController@home'
));

Route::get('site/libros', array(
    'as' => 'site.libros',
    'uses' => 'LibrosController@libros'
));