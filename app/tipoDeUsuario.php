<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipoDeUsuario extends Model
{
    public $table = 'tipo_de_usuario';
    public $guarded = [];
    public $timestamps = null;

    protected $fillable = [
        'tipo'
    ];
}
