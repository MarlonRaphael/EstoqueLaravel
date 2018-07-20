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
    return view('welcome');
});

Auth::routes();

//Route::controllers([
//    'auth'      => 'Auth\AuthController',
//    'password'  => 'Auth\PasswordController',
//]);

Route::get('/produtos/remove/{id}', [
    'middleware' => 'nosso-middleware',
    'uses' => 'ProdutoController@remove'
]);

Route::get('/login', 'LoginController@login');

Route::get('/logout', 'LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/produtos', 'ProdutoController@lista');

Route::get('/produtos/mostrar/{id}', 'ProdutoController@mostrar')->where('id', '[0-9]+');

Route::get('/produtos/novo', 'ProdutoController@novo');

Route::post('/produtos/adiciona', 'ProdutoController@adiciona');

Route::get('/produtos/editar/{id}', 'ProdutoController@editar')->where('id', '[0-9]+');

Route::post('/produtos/altera', 'ProdutoController@altera');

Route::get('/produtos/remove/{id}', 'ProdutoController@remove');

Route::get('/produtos/json', 'ProdutoController@listaJson');