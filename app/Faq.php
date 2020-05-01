<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    public $guarded = [];

    protected $fillable = [
        'titulo_pregunta', 'respuesta',
    ];
}
