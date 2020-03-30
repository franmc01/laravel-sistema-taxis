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

Route::get('/', 'PaginaPrincipalController@index' );
Route::get('/home','HomeController@index' )->name('administracion');





// Route::group(['prefix' => 'home','namespace' => 'Administracion','middleware' => 'auth'],function () {
//     Route::get('usuarios', 'UsuariosController@index' )->name('usuarios.index');
// });



Route::group([
    'prefix' => 'home',
    'namespace' => 'Administracion',
    'middleware' => ['role:administrador']],
function () {
    //Here your routes
    Route::resource('usuarios', 'UsuariosController');
});

Route::group(['middleware' => ['role:usuario']], function () {
    //Here your routes
});

Route::group(['middleware' => ['role:moderador']], function () {
    //Here your routes
});

Route::view('login2', 'loginv2');





// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
