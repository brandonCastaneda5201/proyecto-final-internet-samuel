<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Etiqueta;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class LibroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::with(['etiquetas'])->get();
        return view ("listado-libros", compact("libros"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
        return view("crear-libro", [
            'etiquetas' => Etiqueta::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => ['required', 'max:255', 'unique:libros'],
            'autor' => ['required', 'max:255'],
            'editorial' => ['required', 'max:255'],
            'edicion' => ['required', 'max:255'],
            'sinopsis' => ['required'],
            'stock' => ['required', 'min:1'],
            'fecha_publicacion' => ['required', 'date'],
            'paginas' => ['required', 'min:1'],
            'etiquetas' => ['required']
        ]);
        $libro = Libro::create($request->all());
        $libro->etiquetas()->attach($request->etiquetas);
        return redirect()->route('libro.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Libro $libro)
    {
        $libro->load('etiquetas');
        return view('show-libro', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        //Gate::authorize("update-libro", $libro);
        $etiquetas = Etiqueta::all();
        $libro->load('etiquetas');
        return view("edit-libro", compact("libro", "etiquetas"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libro $libro)
    {
        $request->validate([
            'titulo' => ['required', 'max:255'],
            'autor' => ['required', 'max:255'],
            'editorial' => ['required', 'max:255'],
            'edicion' => ['required', 'max:255'],
            'sinopsis' => ['required'],
            'stock' => ['required', 'min:1'],
            'fecha_publicacion' => ['required', 'date'],
            'paginas' => ['required', 'min:1'],
        ]);
        $libro->update($request->all());
        $libro->etiquetas()->sync($request->etiquetas);
        return redirect()->route('libro.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();
        return redirect()->route('libro.index');
    }
}
