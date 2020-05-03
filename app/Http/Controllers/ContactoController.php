<?php

namespace App\Http\Controllers;

use App\Contacto;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
class contactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactos = Contacto::all();
        return view('admin.contactos.index')->with('contactos', $contactos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $req)
    {
        $this->validate($req, [
            'nombre' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email:rfc,dns', 'max:255'],
            'mensaje' => ['required', 'string'],
            'usuario_id' => ['nullable', 'numeric'],
        ]);

        $contactoACrear = [
            'nombre' => $req["nombre"],
            "email" => $req["email"],
            "mensaje" => $req["mensaje"]
        ];
        if (isset($req["usuario_id"])) {
            $contactoACrear["usuario_id"] = $req["usuario_id"];
        }
        Contacto::create($contactoACrear);
        return redirect()->route("home");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show(Contacto $contacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit(Contacto $contacto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contacto $contacto)
    {
        if ($request['action'] === "success") {
            $contacto->estado_de_contacto = "Finalizado";
            $contacto->save();
            return redirect()->route('contacto.index')->with("status", "La marca ha sido agregada correctamente");        
        } else if ($request['action'] === "warning") {
            $contacto->estado_de_contacto = "En seguimiento";
            $contacto->save();
            return redirect()->route('contacto.index')->with("status", "La marca ha sido agregada correctamente");        
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacto $contacto)
    {
        $contacto->delete();
        return redirect()->route('contacto.index')->with('status', 'El formulario de contacto se eliminó correctamente');
    }
}
