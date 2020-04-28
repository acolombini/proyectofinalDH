<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    public $guarded = [];

    protected $fillable = [
        "user_id", "item_id", "estado_de_venta", "valoracion_venta"
    ];

    public function getIDDeUsuarioDeLaCompra(){
        return $this->user_id;
    }

    public function getIDDeItemsDeLaCompra(){
        return $this->item_id;
    }

    public function getEstadoDeVenta(){
        return $this->estado_de_venta;
    }

    public function getValoracionDeLaVenta(){
        return $this->valoracion_venta;
    }
}
