<x-layout :titulo="'Compra # ' . $compra->id">
    <h1>Compra #{{ $compra->id }}</h1>

    @if($compra->archivo)
        <img src="{{ Storage::url($compra->archivo->ruta) }}" />
    @else
        <img src="{{ asset('smile.png') }}" />
    @endif

    <p>
        <ul class="compra-detalles">
            <li>Usuario: {{ $compra->user->name }} {{ $compra->user->apellido }}</li>
            <li>Libro: {{ $compra->libro->titulo }}</li>
            <li>Precio: ${{ number_format($compra->precio, 2) }}</li>
            <li>Stock: {{ $compra->stock }}</li>
            <li>Estado: {{ ucfirst($compra->estado) }}</li>
            <li>Fecha de cambio de estado: {{ $compra->fecha_cambio_estado ? \Carbon\Carbon::parse($compra->fecha_cambio_estado)->format('d/m/Y') : 'No disponible' }}</li>
        </ul>
    </p>

    <a href="{{ route('compra.index') }}">
        <button class="btn btn-gradient-info btn-rounded btn-fw mb-2">Volver a todas las compras</button>
    </a><br>

    @can('update', $compra)
        <a href="{{ route('compra.edit', $compra) }}">
            <button class="btn btn-gradient-warning btn-rounded btn-fw">Editar</button>
        </a><br>
    @endcan
</x-layout>
