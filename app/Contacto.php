<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    public $guarded = [];

    protected $fillable = [
        'nombre', 'email', 'mensaje', 'usuario_id',
    ];

    public function usuario(){
        return $this->belongsTo("App\User", "usuario_id");
    }
}
