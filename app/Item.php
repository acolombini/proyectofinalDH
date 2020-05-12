<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $guarded = [];

    protected $fillable = [
        'product_id', "cantidad_de_productos", "user_id"
    ];

    public function getProductos(){
        return $this->product_id;
    }

    public function getCantidadDeProductos(){
        return $this->cantidad_de_productos;
    }

    public function usuario(){
        return $this->belongsTo("App\User", "user_id");
    }

    public function productos(){
        return $this->belongsTo("App\Product", "producto_id");
    }

    public function compra(){
        return $this->belongsToMany("App\User", "compra", "item_id", "user_id");
    }
}
