<?php

namespace App\Http\Controllers;
use App\Item;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;

class itemsController extends Controller
{
    public function insert(Request $req){
        $this->validate($req, [
            'producto_id' => ['required', 'numeric'],
            'user_id' => ['required', 'numeric'],
        ]);

        Item::create([
            'product_id' => $req['producto_id'],
            'user_id' => $req['user_id'],
            'cantidad_de_productos' => 1
        ]);

        return redirect()->route('home')->with("status", "El producto se ha agregado al carrito satisfactoriamente.");
    }

    public function delete(Request $producto){
        $producto->delete();
        return redirect()->route('home')->with("status", "El producto ha sido eliminado del carrito.")
    }
}
