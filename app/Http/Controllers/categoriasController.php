<?php

namespace App\Http\Controllers;
use App\Categoria;
use Illuminate\Http\Request;

class categoriasController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.categorias.index')->with('categorias', $categorias);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categorias.create');
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
            'nombre_categoria' => ['required', 'string', 'max:50', 'unique:categorias,nombre_categoria']
        ]);

        Categoria::create([
            'nombre_categoria' => $request['nombre_categoria']
        ]);

        return redirect()->route('categorias.index')->with("status", "La categoría ha sido agregada correctamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);
        $otras_categorias = Categoria::all();
        return view('front.categorias.index', compact("categoria", "otras_categorias"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        $categoria = Categoria::find($categoria->id);
        return view('admin.categorias.edit', compact('categoria'));
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
            'nombre_categoria' => ['required', 'string', 'max:50', 'unique:categorias,nombre_categoria']
        ]);
        $categoria = Categoria::find($id);
        $categoria->nombre_categoria = $request['nombre_categoria'];
        $categoria->save();
        return redirect()->route('categorias.index')->with("status", "La categoría ha sido agregada correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categoria::find($id)->delete();
        return redirect()->route('categorias.index')->with('status', "La categoría ha sido eliminada correctamente");
    }
    
    // Middleware
    public function __construct()
    {
        $this->middleware('administrador')->only('index', 'create', 'store', 'destroy', 'edit', 'update');
    }
}