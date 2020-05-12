<?php

namespace App\Http\Controllers;
use App\Marca;
use Illuminate\Http\Request;

class marcasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::all();
        return view('admin.marcas.index')->with('marcas', $marcas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.marcas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre_marca' => ['required', 'string', 'max:50', 'unique:marcas,nombre_marca']
        ]);

        Marca::create([
            'nombre_marca' => $request['nombre_marca']
        ]);

        return redirect()->route('marcas.index')->with("status", "La marca ha sido agregada correctamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Marca $marca)
    {
        $marca = Marca::find($marca->id);
        return view('admin.marcas.edit', compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre_marca' => ['required', 'string', 'max:50', 'unique:marcas,nombre_marca']
        ]);
        $marca = Marca::find($id);
        $marca->nombre_marca = $request['nombre_marca'];
        $marca->save();
        return redirect()->route('marcas.index')->with("status", "La marca ha sido agregada correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Marca::find($id)->delete();
        return redirect()->route('marcas.index')->with('status', "La marca ha sido eliminada correctamente");
    }

        // Middleware
        public function __construct()
        {
            $this->middleware('administrador')->only('index', 'create', 'store', 'destroy', 'edit', 'update');
        }
}
