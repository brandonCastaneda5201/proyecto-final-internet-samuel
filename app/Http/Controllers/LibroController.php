<?php

namespace App\Http\Controllers;

use App\Mail\LibroCreado;
use App\Models\Archivo;
use App\Models\Libro;
use App\Models\Etiqueta;
use App\Models\User;
use App\Models\Compra;
use App\Mail\CompraRealizadaMail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\map;

class LibroController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'], ['except' => ['index', 'show']]);
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
            'precio' => ['required', 'min:1'],
            'etiquetas' => ['required'],
            'portada' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);
        $libro = Libro::create($request->all());
        if($request->hasFile('portada')){
            $ruta = $request->portada->store("portada", "public");
            $archivo = new Archivo([
                "nombre_original" => $request->portada->getClientOriginalName(),
                "ruta" => $ruta
            ]);
            $libro->archivo()->save($archivo);
        }
        $libro->etiquetas()->attach($request->etiquetas);
        $usuarios = User::pluck("email");
        return redirect()->route('libro.index')->with('success', 'Libro creado con exito.');
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
            'etiquetas' => ['required'],
            'precio' => ['required', 'min:1'],
            'portada' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);
        $libro->update($request->all());
        if($request->hasFile('portada')){
            if($libro->archivo != null){
                Storage::disk('public')->delete($libro->archivo->ruta);
                $libro->archivo()->delete();
            }
            $ruta = $request->portada->store("portada", "public");
            $archivo = new Archivo([
                "nombre_original" => $request->portada->getClientOriginalName(),
                "ruta" => $ruta
            ]);
            $libro->archivo()->save($archivo);
        }
        $libro->etiquetas()->sync($request->etiquetas);
        return redirect()->route('libro.index')->with('success', 'Libro actualizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libro $libro)
    {
        $this->authorize('delete', $libro);
        if($libro->archivo != null){
            Storage::disk('public')->delete($libro->archivo->ruta);
            $libro->archivo()->delete();
        }
        $libro->delete();
        return redirect()->route('libro.index')->with('success', 'Libro eliminado con exito.');
    }

    public function comprarVista($id){
        $libro = Libro::find($id);
        if (!$libro) {
            return redirect()->route('libro.index')->with('error', 'El libro no fue encontrado.');
        }
        if($libro->stock <= 0){
            return redirect()->route('libro.index')->with('error', 'No hay stock disponible para ese libro.');
        }
        $this->authorize('comprar', $libro);
        return view('comprar-libro', compact('libro'));
    }

    public function comprar(Request $request, Libro $libro){
        if (!$libro) {
            return redirect()->route('libro.index')->with('error', 'El libro no fue encontrado.');
        }
        if($libro->stock < $request->stock){
            return redirect()->route('libro.index')->with('error', 'No hay stock suficiente para ese libro.');
        }
        $this->authorize('comprar', $libro);
        $usuario = Auth::user();
        $request->validate([
            'stock' => ['required', 'min:1', 'max:' . $libro->stock],
            'method_pay' => 'required|in:tarjeta_bancaria,efectivo',
        ]);
        $compra = Compra::create([
            'user_id' => $usuario->id,
            'libro_id' => $libro->id,
            'precio' => ($request->stock * $libro->precio),
            'stock' => $request->stock,
            'estado' => ($request->method_pay == 'tarjeta_bancaria' ? 'pagado' : 'reservado'),
            'fecha_cambio_estado' => now(),
        ]);
        $libro->stock -= $request->stock;
        $libro->save();
        $compra->libro = $libro;
        Mail::to($usuario->email)->send(new CompraRealizadaMail($compra));
        return redirect()->route('compra.index')->with('success', 'Gracias por comprar en nuestra libreria.');
    }
}
