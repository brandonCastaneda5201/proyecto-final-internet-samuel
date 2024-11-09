<x-layout titulo="Todos los clientes">
    <h1>Clientes</h1>
    <p>
        @can('create', App\Models\User::class)
            <a class="text-white-no-decor" href="{{ route('cliente.create') }}"><button class="btn btn-gradient-primary btn-rounded btn-fw">Agregar Cliente</button></a>
        @endcan
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </p>
    <x-tabla :elementos="$clientes" modelo="cliente"/>
</x-layout>