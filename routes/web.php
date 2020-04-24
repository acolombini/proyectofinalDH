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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Vista de un producto
Route::get('/producto/{id}', 'productosController@show');

//Listado de productos
Route::get('/productos', 'productosController@listaDeProductos');

// Rutas para ingresar un producto
Route::get('/ingresarProducto', function(){
    return view('ingresarProducto');
});
Route::post('/ingresarProducto', 'productosController@guardar');

// Ruta para eliminar un producto
Route::delete('/producto/{id}', 'productosController@delete');

//Ruta para modificar un producto
Route::get('/producto/{id}/edit', 'productosController@edit');
Route::put('/producto/{id}', 'productosController@update');