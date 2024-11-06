<x-layout titulo="Todas las compras">
    <h1>Compras</h1>
    <p>
        @can('create', App\Models\Compra::class)
            <a class="text-white-no-decor" href="{{ route('compra.create') }}"><button class="btn btn-gradient-primary btn-rounded btn-fw">Agregar Compras</button></a>
        @endcan
    </p>
    <x-tabla :elementos="$compras" modelo="compra"/>
</x-layout>