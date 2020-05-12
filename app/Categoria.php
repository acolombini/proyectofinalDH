<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
class Categoria extends Model
{
    public $guarded = [];
    public $timestamps = false;

    protected $fillable = [
        'nombre_categoria'
    ];

    public function getNombreCategoria(){
        return $this->nombre_categoria;
    }

    public function productos(){
        return $this->hasMany("App\Product", "categoria_id");
    }
}
