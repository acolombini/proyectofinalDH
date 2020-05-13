<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $productos = Product::take(12)->get();
        $categorias = Categoria::all();

        return view('home', compact('productos', 'categorias'));//->with([
            //     'productos' => $productos,
            //     'categorias' => $categorias
            // ]);
    }

    public function getAll()
    {
        $productos = Product::all();
        $categorias = Categoria::all();
        return view('front.productos.indexAll')->with([
            'productos' => $productos,
            'categorias' => $categorias
        ]);
    }

    public function search(request $request){


        $buscador = $request->buscar;
        $productos = Product::where("titulo", "LIKE", "%" . $buscador . "%")->ORDERBY("titulo")->paginate(5);

        // Creo variables para filtrar por medio de JS mientras se escribe
        // $nombreProductos = [];
        // $todosLosProductos = Product::all();
        // foreach ($todosLosProductos as $producto) {
        //     $nombreProductos[] = [
        //         "titulo" => $producto->getTitulo(),
        //         "id" => $producto->getID()
        //     ];
        // }

        // $vac = compact('productos', 'nombreProductos');
        return view("front.productos.search")->with('productos', $productos);
    }
}
