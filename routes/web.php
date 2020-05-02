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

// Route::GET('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::GET('/', 'HomeController@index')->name('home');


/*=============================================
=                   Rutas Backend                   =
=============================================*/

Route::resource('faq', 'FaqController');
Route::resource('contacto', 'ContactoController');
Route::resource('productos', 'productosController');

Route::resource('categorias', 'categoriasController');








/*============  End of Rutas Backend  =============*/

route::get('todos-los-productos', 'HomeController@getAll')->name('todos-los-productos');
/*============  End of Productos  =============*/


//Vista de un producto
//Route::GET('/producto/{id}', 'productosController@show')->middleware('usuarioLogueado');
// Route::GET('/producto/admin/{id}', 'productosController@show')->middleware('administrador');

// //Listado de productos
// Route::GET('/productos', 'productosController@listaDeProductos')->middleware('usuarioLogueado');

// //Productos por Categorías
// Route::GET('/categorias', 'categoriasController@show')->middleware('usuarioLogueado');
// Route::GET('/categoria/{id}', "categoriasController@products")->middleware('usuarioLogueado');

// //Busqueda de un producto
// Route::GET('productos/buscar', 'productosController@search')->middleware('usuarioLogueado');

// // Rutas para ingresar un producto
// Route::GET('/ingresarProducto', 'productosController@create')->middleware("administrador");
// Route::POST('/ingresarProducto', 'productosController@guardar')->middleware('administrador');

// // Ruta para eliminar un producto
// Route::delete('/producto/{id}', 'productosController@delete')->middleware('administrador');

// //Ruta para modificar un producto
// Route::GET('/producto/{id}/edit', 'productosController@edit')->middleware('administrador');
// Route::PUT('/producto/{id}', 'productosController@update')->middleware('administrador');

// Ruta para modificar campos opcionales de usuario
Route::GET("usuario/edit", 'userController@edit')->middleware('usuarioLogueado')->name('user.edit');
Route::PUT("usuario/edit", 'userController@update')->middleware('usuarioLogueado')->name('user.update');

// Ruta para agregar un producto al carrito
Route::POST("carrito", 'itemsController@insert')->middleware('usuarioLogueado')->name('carrito.insert');
Route::DELETE("carrito", 'itemsController@delete')->middleware('usuarioLogueado')->name('carrito.delete');

// Ruta para enviar un formulario de contacto
Route::POST('contacto', 'contactoController@insert')->name("contacto.insert");
/*=============================================
=                   Vistas Admin              =
=============================================*/

route::get('administrador', function(){
return view('admin.dashboard');
})->name('admin.dashboard');



