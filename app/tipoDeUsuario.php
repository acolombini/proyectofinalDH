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

    public function usuarios(){
        return $this->hasMany("App\User", "tipo_de_usuario_id");
    }
}
