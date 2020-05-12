<?php

namespace App;
use App\Categoria;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $guarded = [];

    protected $fillable = [
        'titulo', 'descripcion', 'categoria_id', 'precio_unitario', 'descuento', 'stock', 'poster'
    ];

    public function getTitulo(){
        return $this->titulo;
    }

    public function getID(){
        return $this->id;
    }

    public function categoria(){
        return $this->belongsTo("App\Categoria", "categoria_id");
    }

    public function marca(){
        return $this->belongsTo("App\Marca", "marca_id");
    }

    public function item(){
        return $this->hasMany("App\Item", "producto_id");
    }
}
