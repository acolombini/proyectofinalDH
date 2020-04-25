<?php

use Illuminate\Support\Facades\Route;

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

Route::GET('/', function () {
    return view('welcome');
});

Auth::routes();

Route::GET('/home', 'HomeController@index')->name('home');


//Vista de un producto
Route::GET('/producto/{id}', 'productosController@show');

//Listado de productos
Route::GET('/productos', 'productosController@listaDeProductos');

// Rutas para ingresar un producto
Route::GET('/ingresarProducto', function(){
    return view('ingresarProducto');
});
Route::POST('/ingresarProducto', 'productosController@guardar');

// Ruta para eliminar un producto
Route::delete('/producto/{id}', 'productosController@delete');

//Ruta para modificar un producto
Route::GET('/producto/{id}/edit', 'productosController@edit');
Route::PUT('/producto/{id}', 'productosController@update');

// Ruta para modificar campos opcionales de usuario
Route::GET("usuario/edit", 'userController@edit');
Route::PUT("usuario/edit", 'userController@update');