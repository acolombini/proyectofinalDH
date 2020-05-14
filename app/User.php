<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellido', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public $guarded = [];

    public function getNombreCompleto(){
        return $this->nombre . " " . $this->apellido;
    }

    public function compras(){
        return $this->hasMany("App\Compra", "user_id");
    }

    public function carrito(){
        return $this->hasMany("App\Item", "user_id");
    }

    public function compra(){
        return $this->belongsToMany("App\Item", "compra", "user_id", "item_id");
    }

    public function tipo_de_usuario(){
        return $this->belongsTo('App\tipoDeUsuario', "tipo_de_usuario_id");
    }

    public function contacto(){
        return $this->hasMany("App\Contacto", "usuario_id");
    }
}
