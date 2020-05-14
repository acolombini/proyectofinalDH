<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Storage;
class userController extends Controller
{
    public function index(){
        $usuarios = User::all();
        return view('admin.usuarios.index')->with('usuarios', $usuarios);
    }

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

    public function destroy(User $usuario){
        if($usuario->tipo_de_usuario_id === 2){
            return redirect()->route('usuarios.index')->with('statuswrong', 'Eliminación incorrecta. Usted no puede eliminar un usuario que es administrador.');
        }
        if(!$usuario->carrito->isEmpty()){
            foreach($usuario->carrito as $carrito){
                $carrito->delete();
            }
        }
        if(!$usuario->contacto->isEmpty()){
            foreach($usuario->contacto as $contacto){
                $contacto->delete();
            }
        }
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('status', 'El usuario se ha eliminado correctamente.');
    }

    public function __construct(){
        $this->middleware('auth')->only('destroy', 'index');
        $this->middleware('administrador')->only('destroy', 'index');
    }
    }

