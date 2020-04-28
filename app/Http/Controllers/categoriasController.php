<?php

namespace App\Http\Controllers;
use App\Categoria;
use Illuminate\Http\Request;

class categoriasController extends Controller
{
    public function show(){
        $categorias = Categoria::all();
        return view('categorias/categorias', compact('categorias'));
    }

    public function products($id){
        $productosDeLaCategoria = Categoria::find($id)->productos;
        $categorias = Categoria::all();
        $categoriaElegida = Categoria::find($id);
        return view('categorias/categoria', compact('productosDeLaCategoria', 'categorias', 'categoriaElegida'));
    }
}
