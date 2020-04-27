<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $guarded = [];

    protected $fillable = [
        'titulo', 'descripcion', 'precio_unitario', 'descuento', 'stock', 'poster'
    ];

    public function getTitulo(){
        return $this->titulo;
    }

    public function getID(){
        return $this->id;
    }
}
