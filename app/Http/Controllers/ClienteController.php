<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Http\Request;

class ClienteController extends Controller
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
        $clientes = Cliente::all();
        return view("listado-clientes", compact("clientes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("crear-cliente");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'max:255'],
            'apellido' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:clientes'],
            'telefono' => ['nullable', 'max:15'],
            'direccion' => ['nullable', 'max:255'],
        ]);

        Cliente::create($request->all());

        return redirect()->route('cliente.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        return view('show-cliente', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view("edit-cliente", compact("cliente"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombre' => ['required', 'max:255'],
            'apellido' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:clientes,email,' . $cliente->id],
            'telefono' => ['nullable', 'max:15'],
            'direccion' => ['nullable', 'max:255'],
        ]);

        $cliente->update($request->all());

        return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('cliente.index');
    }
}
