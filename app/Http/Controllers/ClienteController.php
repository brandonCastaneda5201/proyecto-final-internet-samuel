<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Permiso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
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
        $this->authorize('viewAny', User::class);
        $clientes = User::all();
        return view("listado-clientes", compact("clientes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', User::class);
        return view("crear-cliente");  // Cambia esto si es necesario
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', User::class);
        $request->validate([
            'name' => ['required', 'max:255'], // Campo de nombre
            'apellido' => ['required', 'max:255'], // Campo de apellido
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'telefono' => ['nullable', 'max:15'], // Campo de teléfono
            'direccion' => ['nullable', 'max:255'], // Campo de dirección
            'password' => ['required', 'min:8'], // Nueva regla para la contraseña
        ]);

       
        $user = User::create([
            'name' => $request->name,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'password' => bcrypt($request->password), 
        ]);

        Permiso::create([
            'user_id' => $user->id,
            'show-libro' => true,
            'create-libro' => false,
            'edit-libro' => false,
            'delete-libro' => false,
            'show-cliente' => false,
            'create-cliente' => false,
            'edit-cliente' => false,
            'delete-cliente' => false,
            'show-etiqueta' => false,
            'create-etiqueta' => false,
            'edit-etiqueta' => false,
            'delete-etiqueta' => false,
            'show-permiso' => false,
            'edit-permiso' => false,
            'show-compra' => false,
            'create-compra' => false,
            'edit-compra' => false,
            'delete-compra' => false,
            'compra-libro' => true,
        ]);
        $user->sendEmailVerificationNotification();

        return redirect()->route('cliente.index')->with('success', 'Cliente creado con exito.');  
    }

    /**
     * Display the specified resource.
     */
    public function show(User $cliente)
    {
        $this->authorize('view', $cliente);
        return view('show-cliente', compact('cliente'));  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $cliente)
    {
        $this->authorize('update', User::class);
        return view("edit-cliente", compact("cliente"));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $cliente)
    {
        $this->authorize('update', User::class);
        $request->validate([
            'name' => ['required', 'max:255'],
            'apellido' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $cliente->id],
            'telefono' => ['nullable', 'max:15'],
            'direccion' => ['nullable', 'max:255'],
            'password' => ['required', 'max:255'],
        ]);

        $cliente->update($request->only(['name', 'apellido', 'email', 'telefono', 'direccion','password'])); // Actualiza solo los campos permitidos

        return redirect()->route('cliente.index')->with('success', 'Cliente editado con exito.');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $cliente)
    {
        $this->authorize('update', User::class);
        $cliente->delete();
        return redirect()->route('cliente.index')->with('success', 'Cliente eliminado con exito.');  
    }
}
