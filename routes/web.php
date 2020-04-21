<?php

use Illuminate\Support\Facades\Route;


Route::resource('correo', 'Correos\ContactController');
Route::get('/', 'PaginaPrincipalController@index');
Route::get('/home', 'HomeController@index')->name('administracion');


Route::group(
    [
        'namespace' => 'Administracion',
        'middleware' => ['role:Administrador']
    ],
    function () {

        //rutas de usuario
        Route::resource('usuarios', 'UsuariosController');
        Route::get('inactivos', 'UsuariosController@eliminados')->name('usuarios.eliminados');
        Route::get('restaurar/{user}', 'UsuariosController@user_restore')->name('usuarios.restore');
        Route::get('eliminar/{user}', 'UsuariosController@user_force')->name('usuarios.forceDelete');

        //rutas de vehiculo
        Route::resource('vehiculos', 'VehiculosController');
        Route::post('vehiculos/update', 'VehiculosController@update')->name('vehiculos.update');
        Route::get('vehiculos/destroy/{id}', 'VehiculosController@destroy');

        //rutas de cuotas
        Route::resource('cuotas', 'CuotasController');

    }
);

Route::group(['middleware' => ['role:Usuario']], function () {
    //Here your routes
});

Route::group(['middleware' => ['role:Moderador']], function () {
    //Here your routes
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Rutas de prueba
Route::view('welcome', 'welcome');
Route::get('mail', function () { return new App\Mail\LoginCredentials(App\User::first(), 'aldjad'); });
