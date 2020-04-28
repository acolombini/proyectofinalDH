<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public $guarded = [];
    public $timestamps = false;

    protected $fillable = [
        'nombre_categoria'
    ];

    public function getCategoria(){
        return $this->nombre_categoria;
    }
}
