<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Storage;
class userController extends Controller
{
    public function edit(){
        $usuarioLogueado = Auth::user();
        return view('front.user.editarUsuario')->with('usuarioLogueado', $usuarioLogueado);
    }

    public function update(Request $req){
        $this->validate($req, [
            'nombre' => ['required', 'string', 'max:50'],
            'apellido' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255'],
            'telefono' => ['nullable', 'numeric', 'min:0'],
            'tipo_de_documento' => ["nullable", "string"],
            'documento' => ["nullable", "numeric","min:0"],
            'fecha_de_nacimiento' => ['nullable', 'date'],
            'domicilio' => ['nullable', 'string', 'max:50'],
            'avatar' => ['nullable', 'mimes:jpeg,bmp,png,jpg']
        ]);
        $usuarioAModificar = Auth::User();

        if($req['avatar']){
            if($usuarioAModificar->avatar){
                Storage::delete("public/users_avatar/" . $usuarioAModificar->avatar);
            }
            $ruta = $req->file("avatar")->store("public/users_avatar");
            $nombre_del_archivo=basename($ruta);
            $usuarioAModificar->avatar = $nombre_del_archivo;
        }

        $usuarioAModificar->nombre = $req['nombre'];
        $usuarioAModificar->apellido = $req['apellido'];
        $usuarioAModificar->email = $req['email'];
        $usuarioAModificar->telefono = $req['telefono'];
        $usuarioAModificar->tipo_de_documento = $req['tipo_de_documento'];
        $usuarioAModificar->documento = $req['documento'];
        $usuarioAModificar->fecha_de_nacimiento = $req['fecha_de_nacimiento'];
        $usuarioAModificar->domicilio = $req['domicilio'];
        $usuarioAModificar->provincia = $req['provincia'];
        $usuarioAModificar->ciudad = $req['ciudad'];

        $usuarioAModificar->save();

        return redirect("/")->with('status', 'Los datos de usuario se han modificado correctamente');
    }
    }

