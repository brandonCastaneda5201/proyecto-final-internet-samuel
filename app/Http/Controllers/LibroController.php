<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::all();
        return view ("listado-libros", compact("libros"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view("crear-libro");
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
        ]);
        $libro = Libro::create($request->all());

        return redirect()->route('libro.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Libro $libro)
    {
        return view('show-noticia', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        return view("edit-libro", compact("libro"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libro $libro)
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
        ]);
        $libro->update($request->all());

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
