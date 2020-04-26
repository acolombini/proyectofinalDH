<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Storage;
class productosController extends Controller
{
    public function listaDeProductos(){
        $productos = Product::paginate(10);
        return view('productos/listadoDeProductos', compact('productos'));
    }

    public function guardar(Request $req){

        $this->validate($req, [
            'titulo' => ['required', 'string', 'max:50', 'unique:products,titulo'],
            'descripcion' => ['required', 'string', 'max:255'],
            'precio_unitario' => ['required', 'numeric', 'min:0'],
            'descuento' => ["nullable", "numeric","min:0","max:100"],
            'stock' => ['required', 'numeric', 'min:0'],
        ]);
        $nombre_del_archivo = '';
        if(isset($req['poster'])){
        $ruta = $req->file("poster")->store("public/product_poster");
        $nombre_del_archivo=basename($ruta);
        }
        Product::create([
            'titulo' => $req['titulo'],
            'descripcion' => $req['descripcion'],
            'precio_unitario' => $req['precio_unitario'],
            'descuento' => $req['descuento'],
            'stock' => $req['stock'],
            'poster' => $nombre_del_archivo
        ]);

        return redirect('/productos');
    }

    public function show($id){
        $producto = Product::find($id);
        $vac = compact('id', 'producto');
        return view("productos/producto", $vac);
    }

    public function showAdmin($id){
        $producto = Product::find($id);
        $vac = compact('id', 'producto');
        return view("productos/productoAdmin", $vac);
    }

    public function delete(Request $req){
        $productoAEliminar = Product::find($req['id']);
        $productoAEliminar->delete();
        if($productoAEliminar->poster){
            Storage::delete('public/product_poster/'.$productoAEliminar->poster);
        }
        return redirect('/productos')->with("status", "El producto ha sido eliminado.");
    }

    public function edit(Request $req){
        $productoAModificar = Product::find($req['id']);
        $vac = compact('idDelProductoAModificar', 'productoAModificar');
        return view('productos/editarProducto', $vac);
    }

    public function update(Request $req){

        $this->validate($req, [
            'titulo' => ['required', 'string', 'max:50'],
            'descripcion' => ['required', 'string', 'max:255'],
            'precio_unitario' => ['required', 'numeric', 'min:0'],
            'descuento' => ["nullable", "numeric","min:0","max:100"],
            'stock' => ['required', 'numeric', 'min:0'],
            'poster' => ['nullable', 'mimes:jpeg,bmp,png,jpg']
        ]);
        $productoAModificar = Product::find($req['id']);
        if($req['poster']){
            if($productoAModificar->poster){
                Storage::delete('public/product_poster/' . $productoAModificar->poster);
            }
            $ruta = $req->file("poster")->store("public/product_poster");
            $nombre_del_archivo=basename($ruta);
            $productoAModificar->poster = $nombre_del_archivo;
        }
        $productoAModificar->titulo = $req['titulo'];
        $productoAModificar->descripcion = $req['descripcion'];
        $productoAModificar->precio_unitario = $req['precio_unitario'];
        $productoAModificar->descuento = $req['descuento'];
        $productoAModificar->stock = $req['stock'];
        
        
        $productoAModificar->save();

        return redirect("producto/" . $productoAModificar['id'])->with('status', 'El Producto se ha modificado correctamente');
    }
}
