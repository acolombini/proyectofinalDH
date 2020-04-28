<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $guarded = [];

    protected $fillable = [
        'product_id', "cantidad_de_productos"
    ];

    public function getProductos(){
        return $this->product_id;
    }

    public function getCantidadDeProductos(){
        return $this->cantidad_de_productos;
    }
}
