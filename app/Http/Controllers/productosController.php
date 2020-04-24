<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class productosController extends Controller
{
    public function listaDeProductos(){
        $productos = Product::all();
        return view('listadoDeProductos', compact('productos'));
    }

    public function guardar(Request $req){

        $this->validate($req, [
            'titulo' => ['required', 'string', 'max:50', 'unique:products,titulo'],
            'descripcion' => ['required', 'string', 'max:255'],
            'precio_unitario' => ['required', 'numeric', 'min:0'],
            'descuento' => ["nullable", "numeric","min:0","max:100"],
            'stock' => ['required', 'numeric', 'min:0']
        ]);
        
        Product::create([
            'titulo' => $req['titulo'],
            'descripcion' => $req['descripcion'],
            'precio_unitario' => $req['precio_unitario'],
            'descuento' => $req['descuento'],
            'stock' => $req['stock']
        ]);

        return redirect('/productos');
    }
}
