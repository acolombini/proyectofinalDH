<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Product;
use App\Categoria;
use Auth;
class productosController extends Controller
{
    public function index(){
        $productos = Product::all();
        return view('admin.productos.index')->with('productos', $productos);
    }

    public function create(){
        $categorias = Categoria::all();
        return view('admin.productos.create')->with('categorias', $categorias);
    }

    public function store(Request $req){
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
        return redirect()->route('productos.index')->with("status", "El producto ha sido creado.");
    }

    public function show($id){
        $producto = Product::find($id);
        $categorias = Categoria::all();
        $vac = compact('id', 'producto', 'categorias');
        if (Auth::user()!= null && Auth::user()->tipo_de_usuario_id === 2) {
            return view("admin.productos.show", $vac);
        } else {
            return view("front.productos.producto", $vac);
        }
    }



    public function destroy(Product $producto){

        if($producto->poster){
            Storage::delete('bpublic/product_poster/'.$producto->poster);
        }
        if($producto->item){
            foreach ($producto->item as $carrito) {
                $carrito->delete();
            }
        }
        $producto->delete();
        return redirect()->route('productos.index')->with("status", "El producto ha sido eliminado.");
    }

    public function edit(Product $producto){
        $categorias = Categoria::all();
        return view('admin.productos.edit')->with([
            'producto' => $producto,
            'categorias' => $categorias
        ]);
    }

    public function update(Request $request, Product $producto){

        $this->validate($request, [
            'titulo' => ['required', 'string', 'max:50'],
            'descripcion' => ['required', 'string', 'max:255'],
            'categoria_id' => ['required', 'numeric', 'min:1', 'max:10'],
            'precio_unitario' => ['required', 'numeric', 'min:0'],
            'descuento' => ["nullable", "numeric","min:0","max:100"],
            'stock' => ['required', 'numeric', 'min:0'],
            'poster' => ['nullable', 'mimes:jpeg,bmp,png,jpg']
        ]);

        if($request->poster){
            if($producto->poster){
                Storage::delete('/storage/product_poster/' . $producto->poster);
            }
            $ruta = $request->file("poster")->store("public/product_poster");
            $nombre_del_archivo=basename($ruta);
            $producto->poster = $nombre_del_archivo;
        }
        $producto->titulo = $request->titulo;
        $producto->descripcion = $request->descripcion;
        $producto->categoria_id = $request->categoria_id;
        $producto->precio_unitario = $request->precio_unitario;
        $producto->descuento = $request->descuento;
        $producto->stock = $request->stock;


        $producto->save();

        return redirect()->route('productos.index')->with('status', 'El producto se ha modificado correctamente');
    }

    // Middleware
    public function __construct()
    {
        $this->middleware('administrador')->only('index', 'create', 'store', 'destroy', 'edit', 'update');
    }
}
