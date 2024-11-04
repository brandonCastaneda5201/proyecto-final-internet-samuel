<?php

namespace App\Http\Controllers;

use App\Models\Etiqueta;
use Illuminate\Http\Request;

class EtiquetaController extends Controller
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
        $this->authorize('viewAny', Etiqueta::class);
        $etiquetas = Etiqueta::all();
        return view ("listado-etiquetas", compact("etiquetas"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Etiqueta::class);
        return view ("crear-etiqueta");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Etiqueta::class);
        $request->validate([
            'nombre' => ['required', 'max:255', 'unique:etiquetas']
        ]);
        $etiqueta = Etiqueta::create($request->all());

        return redirect()->route('etiqueta.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Etiqueta $etiqueta)
    {
        return view ("errors.404");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etiqueta $etiqueta)
    {
        $this->authorize('update', $etiqueta);
        return view('edit-etiqueta', compact('etiqueta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etiqueta $etiqueta)
    {
        $this->authorize('update', $etiqueta);
        $request->validate([
            'nombre' => ['required', 'max:255']
        ]);
        $etiqueta->update($request->all());

        return redirect()->route('etiqueta.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etiqueta $etiqueta)
    {
        $this->authorize('delete', $etiqueta);
        $etiqueta->delete();
        return redirect()->route('etiqueta.index');
    }
}
