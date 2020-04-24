<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'productos';
    public $guarded = [];
    public $timestamps = false;
}
