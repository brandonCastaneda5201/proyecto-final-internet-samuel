<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\User;
use App\Models\Libro;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuario = Auth::user()->load('permiso');
        if($usuario->permiso->getAttribute('show-compra')){
            $compras = Compra::with(['user', 'libro'])->get();
        } else{
            $compras = Compra::with(['user', 'libro'])->where('user_id', $usuario->id)->get();
        }
        return view('listado-compras', compact('compras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Compra::class);
        $users = User::all();
        $libros = Libro::all();
        return view('crear-compra', compact('users', 'libros'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Compra::class);
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'libro_id' => 'required|exists:libros,id',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:1',
            'estado' => 'required|in:cancelado,completado,pagado,reservado',
            'fecha_cambio_estado' => 'nullable|date',
        ]);
        $libro = Libro::find($request->libro_id);
        if($libro->stock < $request->stock){
            return redirect()->route('compra.create')->with('error', 'No hay stock suficiente para ese libro.');
        }
        if($request->fecha_cambio_estado != null){
            $request->fecha_cambio_estado = Carbon::parse($request->fecha_cambio_estado)->setTime(now()->hour, now()->minute, now()->second);
        }
        Compra::create($request->all());
        if($request->estado != 'cancelado'){
            $libro->stock -= $request->stock;
        }
        $libro->save();
        return redirect()->route('compra.index')->with('success', 'Compra creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Compra $compra)
    {
        $this->authorize('view', $compra);
        return view('show-compra', compact('compra'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compra $compra)
    {
        $this->authorize('update', $compra);
        $users = User::all();
        $libros = Libro::all();
        return view('edit-compra', compact('compra', 'users', 'libros'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Compra $compra)
    {
        $this->authorize('update', $compra);
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'libro_id' => 'required|exists:libros,id',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:1',
            'estado' => 'required|in:cancelado,completado,pagado,reservado',
            'fecha_cambio_estado' => 'nullable|date',
        ]);
        if($request->fecha_cambio_estado != null){
            $timestamp = Carbon::parse($request->fecha_cambio_estado)->setTime(now()->hour, now()->minute, now()->second);
            $request->fecha_cambio_estado = $timestamp;
        }
        $compra->update($request->all());

        return redirect()->route('compra.index')->with('success', 'Compra actualizada exitosamente.');
    }

    public function cancelar(Request $request, Compra $compra){
        $this->authorize('view', $compra);
        if($compra->estado != "reservado"){
            return redirect()->route('compra.index')->with('error', 'No se puede realizar esa accion.');
        }
        $libro = Libro::find($compra->libro_id);
        $compra->estado = 'cancelado';
        $compra->fecha_cambio_estado = Carbon::now();
        $libro->stock += $compra->stock;
        $libro->save();
        $compra->save();
        return redirect()->route('compra.index')->with('success', 'Tu compra se cancelo con exito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compra $compra)
    {
        $this->authorize('delete', $compra);
        $compra->delete();

        return redirect()->route('compra.index')->with('success', 'Compra eliminada exitosamente.');
    }
}
