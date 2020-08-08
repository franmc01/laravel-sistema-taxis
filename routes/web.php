<?php

use Illuminate\Support\Facades\Route;

Route::resource('correo', 'Correos\ContactController');
Route::get('/', 'PaginaPrincipalController@index');
Route::get('inicio', 'HomeController@index')->name('administracion');

Route::group(
    [
        'namespace' => 'Administracion',
        'middleware' => ['role:Administrador'],
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
        Route::post('cuotas/mostrar', 'CuotasController@mostrar')->name('cuotas.mostrar');
        Route::post('cuotas/consultar', 'CuotasController@consultar')->name('cuotas.consultar');
        Route::post('cuotas/guardar', 'CuotasController@guardar')->name('cuotas.guardar');
        Route::post('cuotas/socios/fetch', 'CuotasController@fetch')->name('cuotas.socios.fetch');

    }
);

Route::group(
    [
        'namespace' => 'Usuarios',
        'middleware' => ['role:Administrador'],
        // 'middleware' => ['role:Socio']
    ], function () {
        Route::get('mi-perfil', 'PerfilController@index')->name('perfil.info');
        Route::get('mi-perfil/nueva-contraseña', 'PerfilController@contrasena')->name('perfil.cambio');
        Route::patch('mi-perfil/contrasena/{id}', 'PerfilController@Cambiocontrasena')->name('perfil.nueva');
    });

    Route::get('actualizar-informacion', 'PaginaPrincipalController@create')->name('Paginaprincipal.crud.edit');
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
Route::get('mail', function () {return new App\Mail\LoginCredentials(App\User::first(), 'aldjad');});
