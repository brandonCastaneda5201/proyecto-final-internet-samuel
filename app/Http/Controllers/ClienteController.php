<?php

namespace App\Http\Controllers;

use App\Models\User; // Asegúrate de que User es el modelo que utilizas
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
        $clientes = User::all();  // Obtiene todos los usuarios
        return view("listado-clientes", compact("clientes"));  // Asegúrate de que la vista exista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("crear-cliente");  // Cambia esto si es necesario
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'], // Campo de nombre
            'apellido' => ['required', 'max:255'], // Campo de apellido
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'telefono' => ['nullable', 'max:15'], // Campo de teléfono
            'direccion' => ['nullable', 'max:255'], // Campo de dirección
            'password' => ['required', 'min:8'], // Nueva regla para la contraseña
        ]);

       
        User::create([
            'name' => $request->name,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'password' => bcrypt($request->password), 
        ]);

        return redirect()->route('cliente.index');  
    }

    /**
     * Display the specified resource.
     */
    public function show(User $cliente)
    {
        return view('show-cliente', compact('cliente'));  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $cliente)
    {
        return view("edit-cliente", compact("cliente"));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $cliente)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'apellido' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $cliente->id],
            'telefono' => ['nullable', 'max:15'],
            'direccion' => ['nullable', 'max:255'],
            'password' => ['required', 'max:255'],
        ]);

        $cliente->update($request->only(['name', 'apellido', 'email', 'telefono', 'direccion','password'])); // Actualiza solo los campos permitidos

        return redirect()->route('cliente.index');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $cliente)
    {
        $cliente->delete();
        return redirect()->route('cliente.index');  
    }
}
