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

/* Rutas de administración */
Route::resource('admin/mensajes', 'MensajesController');

Route::resource('admin/autores', 'AutoresController');

Route::resource('admin/informes', 'InformesController');

Route::resource('admin/usuarios', 'UserController');

Route::get('user/verify/{token}', array(
    'as' => 'user.verify',
    'uses' => 'UserController@verify'
));

Route::get('user/{usuario}/resend', array(
    'as' => 'resend',
    'uses' => 'UserController@resend'
));

Route::resource('admin/prestamos', 'PrestamosController');

Route::resource('admin/libros', 'LibrosController');

Route::resource('admin/eventos', 'EventosController');

Route::resource('admin/talleres', 'TalleresController');

Route::resource('admin/grupos_libros', 'GruposLibrosController');

Route::resource('admin/grupos_autores', 'GruposAutoresController');

Route::resource('admin/grupos_eventos', 'GruposEventosController');

Route::resource('admin/grupos_talleres', 'GruposTalleresController');

Route::get('admin', array(
    'as' => 'admin',
    'uses' => 'SiteController@admin'
));

/*  Rutas del site  */
Route::get('site/', array(
    'as' => 'site.home',
    'uses' => 'SiteController@home'
));

Route::get('site/libros', array(
    'as' => 'site.libros',
    'uses' => 'LibrosController@site'
));

Route::get('site/libro/{id}', array(
    'as' => 'site.libro',
    'uses' => 'LibrosController@siteShow'
));

Route::get('site/historia', array(
    'as' => 'site.historia',
    'uses' => 'SiteController@historia'
));

Route::get('site/contacto', array(
    'as' => 'site.contacto',
    'uses' => 'MensajesController@create'
));

Route::get('site/autores', array(
    'as' => 'site.autores',
    'uses' => 'AutoresController@site'
));

Route::get('site/autor/{id}', array(
    'as' => 'site.autor',
    'uses' => 'AutoresController@siteShow'
));

/*Route::get('site/talleres', array(
    'as' => 'site.talleres',
    'uses' => 'TalleresController@index'
));

Route::get('site/taller/{id}', array(
    'as' => 'site.taller',
    'uses' => 'TalleresController@siteShow'
));*/

Route::get('site/eventos', array(
    'as' => 'site.eventos',
    'uses' => 'EventosController@site'
));

Route::get('site/eventos/{id}', array(
    'as' => 'site.evento',
    'uses' => 'EventosController@siteShow'
));

/* Rutas de login, registro y password */

/*Route::get('test', function (Faker\Generator $faker) {
    return [
        $user = new App\User,
        $user->name = 'Kevin',
        $user->email = 'kevinjf2011@gmail.com',
        $user->password = bcrypt('123123'),
        $user->remember_token = str_random(10),
        $user->verified = $verificado = $faker->randomElement([App\User::USUARIO_VERIFICADO, App\User::USUARIO_NO_VERIFICADO]),
        $user->verification_token = $verificado == App\User::USUARIO_VERIFICADO ? null : App\User::generarTokenVerificacion(),
        $user->admin = $faker->randomElement([App\User::USUARIO_ADMIN, App\User::USUARIO_REGULAR])
    ];
    $user->save();
    return $user;
});*/

Route::get('login', array(
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
));



Route::post('ingreso/login', array(
    'as' => 'ingreso.login',
    'uses' => 'Auth\LoginController@login'
));

Route::post('logout', array(
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout'
));

Route::get('register', array(
    'as' => 'register',
    'uses' => 'Auth\RegisterController@showRegistrationForm'
));

Route::post('register', array(
    'as' => 'register',
    'uses' => 'Auth\RegisterController@register'
));

Route::get('password/reset', array(
    'as' => 'password.request',
    'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
));

/*
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
));*/

Route::get('/home', 'HomeController@index')->name('home');


/* Rutas para el envío de mails */

//----  AVISO DE PRÉSTAMO VENCIDO  ----//
Route::get('admin/prestamos/aviso/{id}', array(
    'as' => 'admin.prestamos.aviso',
    'uses' => 'PrestamosController@create_aviso'
));

Route::post('admin/prestamos/send_aviso', array(
    'as' => 'admin.prestamos.send_aviso',
    'uses' => 'PrestamosController@send_aviso'
));


/*Route::post('send', array(
    'as' => 'send',
    'uses' => 'MailController@send'
));
Route::get('contact', array(
    'as' => 'contact',
    'uses' => 'MailController@index'
));*/