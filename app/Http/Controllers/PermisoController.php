<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use App\Models\User;
use Illuminate\Http\Request;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permisos = Permiso::with(['user'])->get();
        return view ("listado-permisos", compact("permisos"));    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Permiso $permiso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permiso $permiso)
    {
        $permiso->load('user');
        return view('edit-permisos', compact('permiso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permiso $permiso)
    {
        $permiso->update([
            'show-libro' => $request->has('show-libro'),
            'create-libro' => $request->has('create-libro'),
            'edit-libro' => $request->has('edit-libro'),
            'delete-libro' => $request->has('delete-libro'),
            'show-etiqueta' => $request->has('show-etiqueta'),
            'create-etiqueta' => $request->has('create-etiqueta'),
            'edit-etiqueta' => $request->has('edit-etiqueta'),
            'delete-etiqueta' => $request->has('delete-etiqueta'),
            'show-compra' => $request->has('show-compra'),
            'create-compra' => $request->has('create-compra'),
            'edit-compra' => $request->has('edit-compra'),
            'delete-compra' => $request->has('delete-compra'),
            'show-cliente' => $request->has('show-cliente'),
            'create-cliente' => $request->has('create-cliente'),
            'edit-cliente' => $request->has('edit-cliente'),
            'delete-cliente' => $request->has('delete-cliente'),
            'show-permiso' => $request->has('show-permiso'),
            'edit-permiso' => $request->has('edit-permiso'),
        ]);;
        return redirect()->route('permiso.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permiso $permiso)
    {
        //
    }
}
