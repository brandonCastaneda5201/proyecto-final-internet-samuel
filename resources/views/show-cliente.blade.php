<x-layout :titulo="'Cliente: ' . $cliente->nombre . ' ' . $cliente->apellido">
    <h1>{{ $cliente->name }} {{ $cliente->apellido }}</h1>
    <p>
        <ul class="cliente-detalles">
            <li>Email: {{ $cliente->email }}</li>
            <li>Teléfono: {{ $cliente->telefono ?? 'No disponible' }}</li>
            <li>Dirección: {{ $cliente->direccion ?? 'No disponible' }}</li>
        </ul>
    </p>
    <a href="{{ route('cliente.index') }}">
        <button class="btn btn-gradient-info btn-rounded btn-fw mb-2">Volver a todos los clientes</button>
    </a><br>
    @can('update', $cliente)
        <a href="{{ route('cliente.edit', $cliente) }}">
            <button class="btn btn-gradient-warning btn-rounded btn-fw">Editar</button>
        </a><br>
    @endcan
</x-layout>
