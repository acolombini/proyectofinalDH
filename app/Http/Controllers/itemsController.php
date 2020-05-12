<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Product;
use Auth;
class itemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::where("user_id", Auth::user()->id)->get();
        $vac = compact('items');
        return view('front.items.index', $vac);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $req)
    {
        $this->validate($req, [
            'producto_id' => ['required', 'numeric'],
            'user_id' => ['required', 'numeric'],
        ]);
            // Si existe un producto en la BBDD igual agregado por este usuario, se suma uno en la cantidad de ese producto
        $productoEnLaBBDD = Item::where("user_id", Auth::user()->id)->where('product_id', $req->producto_id)->get();
        if (!$productoEnLaBBDD->isEmpty()){
            $cantidadAnterior = $productoEnLaBBDD[0]->cantidad_de_productos;
            $cantidadDeProductos = $cantidadAnterior + 1;
            $productoEnLaBBDD[0]->cantidad_de_productos = $cantidadDeProductos;
            $productoEnLaBBDD[0]->save();
            return redirect()->route('home')->with("status", "Se ha actualizado la cantidad de productos en el carrito.");
       } else {
        Item::create([
            'product_id' => $req['producto_id'],
            'user_id' => $req['user_id'],
            'cantidad_de_productos' => 1
        ]);
        return redirect()->route('home')->with("status", "El producto se ha agregado al carrito satisfactoriamente.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with("status", "El producto ha sido eliminado del carrito.");
    }
}
