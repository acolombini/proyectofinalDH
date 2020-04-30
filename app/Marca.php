<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    public $guarded = [];

    public function getNombreMarca(){
        return $this->nombre_marca;
    }

    public function productos(){
        return $this->hasMany("App\Product", "marca_id");
    }
}
