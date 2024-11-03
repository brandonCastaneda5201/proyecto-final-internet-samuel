<?php

namespace App\Http\Controllers;

use App\Mail\LibroCreado;
use App\Models\Archivo;
use App\Models\Libro;
use App\Models\Etiqueta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\map;

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
        $this->authorize('create', Libro::class);
        return view("crear-libro", [
            'etiquetas' => Etiqueta::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Libro::class);
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
        $ruta = $request->portada->store("portada", "public");
        $archivo = new Archivo([
            "nombre_original" => $request->portada->getClientOriginalName(),
            "ruta" => $ruta
        ]);
        $libro->archivo()->save($archivo);
        $libro->etiquetas()->attach($request->etiquetas);
        $usuarios = User::pluck("email");
        foreach($usuarios as $usuario){
            Mail::to($usuario)->send(new LibroCreado($libro));
        }
        return redirect()->route('libro.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Libro $libro)
    {
        $libro->load('etiquetas');
        $libro->load("archivo");
        return view('show-libro', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        $this->authorize('edit', Libro::class);
        $etiquetas = Etiqueta::all();
        $libro->load('etiquetas');
        return view("edit-libro", compact("libro", "etiquetas"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libro $libro)
    {
        $this->authorize('update', $libro);
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
        $this->authorize('delete', $libro);
        $libro->delete();
        return redirect()->route('libro.index');
    }
}
