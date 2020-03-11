<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Role;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => ['required', 'string', 'alpha', 'max:100', 'regex:/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸ ]*$/'],
            'apellido' => ['required', 'string', 'alpha', 'max:100', 'regex:/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸ ]*$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'fecha_de_nacimiento' => ['required', 'date_format:d-m-Y', 'after_or_equal:01-01-1900', 'before_or_equal:-18 years'],
            'password' => ['required', 'string', 'min:8', 'max:60', 'confirmed'],
            'numero_de_telefono' => ['nullable', 'string'],
            'numero_de_documento' => ['nullable', 'numeric', 'regex:/^\s*[0-9]{7,8}\s*$/'],
            'tipo_de_documento' => ['nullable', 'string'],
            'provincia' => ['nullable', 'string'],
            'ciudad' => ['nullable', 'string'],
            'calle' => ['nullable', 'string', 'max:100'],
            'altura' => ['nullable', 'string', 'max:50'],
            'piso' => ['nullable', 'string', 'max:50'],
            'departamento' => ['nullable', 'string', 'max:50'],
            'tos' => ['nullable', 'required', 'accepted'],
        ], $messages = [
            'fecha_de_nacimiento.before_or_equal' => 'Debes ser mayor de 18 años!',
            'password.min' => 'El campo contraseña debe contener al menos :min caracteres.',
            'password.max' => 'El campo contraseña no debe contener más de :max caracteres.',
            'password.confirmed' => 'La contraseña no coincide.',
            'password.required' => 'El campo contraseña es obligatorio.',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'nombre' => trim(preg_replace("/ {2,}/", " ", strtolower($data['nombre']))), # Paso todo a minúsculas, reemplazo múltiples espacios por uno solo y trimeo los extremos
            'apellido' => trim(preg_replace("/ {2,}/", " ", strtolower($data['nombre']))), # Paso todo a minúsculas, reemplazo múltiples espacios por uno solo y trimeo los extremos
            'fecha_de_nacimiento' => date("Y-m-d", strtotime($data['email'])), # Convierto la fecha a formato mysql
            'password' => Hash::make($data['password']),
            'numero_de_telefono' => trim($data['name']),
            'numero_de_documento' => trim($data['name']),
            'tipo_de_documento' => $data['email'],
            'provincia' => trim(strtolower($data['email'])),
            'ciudad' => trim(strtolower($data['email'])),
            'calle' => trim(strtolower($data['email'])),
            'altura' => trim($data['email']),
            'piso' => trim(strtolower($data['email'])),
        ]);
        $user->roles()->attach(Role::where('name', 'user')->first());
        return $user;
    }
}
