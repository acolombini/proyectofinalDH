<?php

namespace App\Http\Controllers;
use App\Categoria;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Storage;
class productosController extends Controller
{
    public function index(){
        $productos = Product::paginate(10);

        // Creo variables para filtrar por medio de JS mientras se escribe
        $nombreProductos = [];
        $todosLosProductos = Product::all();
        foreach ($todosLosProductos as $producto) {
            $nombreProductos[] = [
                "titulo" => $producto->getTitulo(),
                "id" => $producto->getID()
            ];
        }

        return view('admin.productos.index', compact('productos', 'nombreProductos'));
    }

    public function guardar(Request $req){
        $this->validate($req, [
            'titulo' => ['required', 'string', 'max:50', 'unique:products,titulo'],
            'descripcion' => ['required', 'string', 'max:255'],
            'categoria_id' => ['required', 'numeric', 'min:1', 'max:10'],
            'precio_unitario' => ['required', 'numeric', 'min:0'],
            'descuento' => ["nullable", "numeric","min:0","max:100"],
            'stock' => ['required', 'numeric', 'min:0'],
            'poster' => ['nullable', 'mimes:jpeg,bmp,png,jpg']
        ]);

        $productoACrear = [
            'titulo' => trim($req['titulo']),
            'descripcion' => trim($req['descripcion']),
            'categoria_id' => $req['categoria_id'],
            'precio_unitario' => trim($req['precio_unitario']),
            'descuento' => $req['descuento'],
            'stock' => $req['stock']
        ];

        $nombre_del_archivo = '';
        if(isset($req['poster'])){
        $ruta = $req->file("poster")->store("public/product_poster");
        $nombre_del_archivo=basename($ruta);
        $productoACrear["poster"] = $nombre_del_archivo;
        }

        Product::create($productoACrear);
        return redirect('/productos');
    }

    public function show($id){
        $producto = Product::find($id);
        $vac = compact('id', 'producto');
        return view("admin.productos.show", $vac);
    }

    public function showAdmin($id){
        $producto = Product::find($id);
        $vac = compact('id', 'producto');
        return view("productos/productoAdmin", $vac);
    }

    public function search(){
        $buscador = $_GET["buscador"];
        $productos = Product::where("titulo", "LIKE", "%" . $buscador . "%")->ORDERBY("titulo")->paginate(5);

        // Creo variables para filtrar por medio de JS mientras se escribe
        $nombreProductos = [];
        $todosLosProductos = Product::all();
        foreach ($todosLosProductos as $producto) {
            $nombreProductos[] = [
                "titulo" => $producto->getTitulo(),
                "id" => $producto->getID()
            ];
        }

        $vac = compact('productos', 'nombreProductos');
        return view('productos/listadoDeProductos', $vac);
    }

<<<<<<< HEAD
    public function destroy(Product $producto){

        if($producto->poster){
            Storage::delete('public/product_poster/'.$producto->poster);
=======
    public function delete(Request $req){
        $productoAEliminar = Product::find($req['id']);
        $productoAEliminar->delete();
        if($productoAEliminar->poster){
            Storage::delete('/storage/product_poster/'. $productoAEliminar->poster);
>>>>>>> 91f787c2f00ca548119d6153c2131bb9ebcf1fdb
        }
        $producto->delete();
        // return redirect('admin.productos.index')->with("status", "El producto ha sido eliminado.");
        return redirect()->route('productos.index')->with("status", "El producto ha sido eliminado.");
    }

<<<<<<< HEAD
    public function edit($id){
        $productoAModificar = Product::find($id);
        $vac = compact('idDelProductoAModificar', 'productoAModificar');
        return view('admin.productos.edit', $vac);
=======
    public function edit(Request $req){
        $productoAModificar = Product::find($req['id']);
        $categorias = Categoria::all();
        $vac = compact('idDelProductoAModificar', 'productoAModificar', 'categorias');
        return view('productos/editarProducto', $vac);
>>>>>>> 91f787c2f00ca548119d6153c2131bb9ebcf1fdb
    }

    public function update(Request $req){

        $this->validate($req, [
            'titulo' => ['required', 'string', 'max:50'],
            'descripcion' => ['required', 'string', 'max:255'],
            'categoria_id' => ['required', 'numeric', 'min:1', 'max:10'],
            'precio_unitario' => ['required', 'numeric', 'min:0'],
            'descuento' => ["nullable", "numeric","min:0","max:100"],
            'stock' => ['required', 'numeric', 'min:0'],
            'poster' => ['nullable', 'mimes:jpeg,bmp,png,jpg']
        ]);
        $productoAModificar = Product::find($req['id']);
        if($req['poster']){
            if($productoAModificar->poster){
                Storage::delete('/storage/product_poster/' . $productoAModificar->poster);
            }
            $ruta = $req->file("poster")->store("public/product_poster");
            $nombre_del_archivo=basename($ruta);
            $productoAModificar->poster = $nombre_del_archivo;
        }
        $productoAModificar->titulo = $req['titulo'];
        $productoAModificar->descripcion = $req['descripcion'];
        $productoAModificar->categoria_id = $req['categoria_id'];
        $productoAModificar->precio_unitario = $req['precio_unitario'];
        $productoAModificar->descuento = $req['descuento'];
        $productoAModificar->stock = $req['stock'];


        $productoAModificar->save();

        return redirect("producto/" . $productoAModificar['id'])->with('status', 'El Producto se ha modificado correctamente');
    }
}
