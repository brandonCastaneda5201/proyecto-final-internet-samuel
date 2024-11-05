<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\User;
use App\Models\Libro;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Compra::class);
        $compras = Compra::with(['user', 'libro'])->get();
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

        Compra::create($request->all());

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

        $compra->update($request->all());

        return redirect()->route('compra.index')->with('success', 'Compra actualizada exitosamente.');
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
