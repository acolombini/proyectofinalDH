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



}
