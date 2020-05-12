<?php

use Illuminate\Support\Facades\Route;
use App\Categoria;
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

Auth::routes();

Route::GET('/', 'HomeController@index')->name('home');


/*=============================================
=                   Rutas Backend                   =
=============================================*/

Route::resource('faq', 'FaqController');
Route::resource('contacto', 'ContactoController');
Route::resource('productos', 'productosController');
Route::resource('categorias', 'categoriasController');
Route::resource('marcas', 'marcasController');
Route::resource('items', 'itemsController');

/*============  End of Rutas Backend  =============*/

route::get('todos-los-productos', 'HomeController@getAll')->name('todos-los-productos');
/*============  End of Productos  =============*/


// Vista de un producto
Route::GET('/producto/{id}', 'productosController@show');
// Route::GET('/producto/admin/{id}', 'productosController@show')->middleware('administrador');

//Productos por Categorías
// Route::GET('/categorias', 'categoriasController@show')->middleware('auth');
Route::GET('/categoria/{id}', "categoriasController@show");

//Busqueda de un producto
Route::GET('productos/buscar', 'productosController@search');
// Route::POST('productos/buscar', 'productosController@search')->middleware('auth');

// Ruta para modificar campos opcionales de usuario
Route::GET("usuario/edit", 'userController@edit')->middleware('auth')->name('user.edit');
Route::PUT("usuario/edit", 'userController@update')->middleware('auth')->name('user.update');

// Ruta para agregar un producto al carrito
Route::POST("carrito", 'itemsController@insert')->middleware('auth')->name('carrito.insert');
Route::DELETE("carrito", 'itemsController@delete')->middleware('auth')->name('carrito.delete');

// Ruta para enviar un formulario de contacto
Route::POST('contacto', 'contactoController@insert')->name("contacto.insert");
/*=============================================
=                   Vistas Admin              =
=============================================*/

route::get('administrador', function(){
return view('admin.dashboard');
})->middleware('administrador')->name('admin.dashboard');



