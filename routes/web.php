<?php

use Illuminate\Support\Facades\Route;

Route::resource('correo', 'Correos\ContactController');
Route::get('/', 'PaginaPrincipalController@index')->name('principal');
Route::get('/home', 'HomeController@index')->name('administracion');

Route::group(['namespace' => 'Administracion', 'middleware' => ['role:Administrador']], function () {

    //rutas de usuario
    Route::resource('usuarios', 'UsuariosController');
    Route::get('inactivos', 'UsuariosController@eliminados')->name('usuarios.eliminados');
    Route::get('restaurar/{user}', 'UsuariosController@user_restore')->name('usuarios.restore');
    Route::get('eliminar/{user}', 'UsuariosController@user_force')->name('usuarios.forceDelete');

    //rutas de vehiculo
    Route::resource('vehiculos', 'VehiculosController');
    Route::post('vehiculos/update', 'VehiculosController@update')->name('vehiculos.update');
    Route::get('vehiculos/destroy/{id}', 'VehiculosController@destroy');

    //rutas de choferes
    Route::resource('choferes', 'ChoferesController');
//    Route::post('vehiculos/update', 'VehiculosController@update')->name('vehiculos.update');
//    Route::get('vehiculos/destroy/{id}', 'VehiculosController@destroy');

    //rutas de cuotas
    Route::resource('cuotas', 'CuotasController');
    Route::post('cuotas/mostrar', 'CuotasController@mostrar')->name('cuotas.mostrar');
    Route::post('cuotas/consultar', 'CuotasController@consultar')->name('cuotas.consultar');
    Route::post('cuotas/guardar', 'CuotasController@guardar')->name('cuotas.guardar');
    Route::post('cuotas/socios/fetch', 'CuotasController@fetch')->name('cuotas.socios.fetch');

}
);

Route::group(['namespace' => 'Usuarios', 'middleware' => ['role:Socio']], function () {
    Route::get('mi-perfil', 'PerfilController@index')->name('perfil.info');
    Route::patch('actualizar-correo/{id}', 'PerfilController@actualizarEmail')->name('perfil.correo');
    Route::get('mi-perfil/nueva-contraseña', 'PerfilController@contrasena')->name('perfil.cambio');
    Route::get('mi-perfil/consulta-cuota-socio', 'PerfilController@cuotasocio')->name('perfil.cuota.socio');
    Route::post('mi-perfil/consulta-socio-cuota-fecha', 'PerfilController@consultarCuota')->name('perfil.consultar.cuota');
    Route::patch('mi-perfil/contrasena/{id}', 'PerfilController@Cambiocontrasena')->name('perfil.nueva');
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
Route::get('mail', function () {return new App\Mail\LoginCredentials(App\User::first(), 'aldjad');});

//No tocar
Route::get('actualizar-informacion', 'PaginaPrincipalController@edit')->name('Paginaprincipal.crud.edit');
Route::patch('confirmar-informacion/{id}', 'PaginaPrincipalController@update')->name('pagina_principal.info.update');

Route::resource('ingresos', 'IngresoController');
Route::resource('egresos', 'EgresoController');
