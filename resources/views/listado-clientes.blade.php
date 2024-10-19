<x-layout titulo="Todos los clientes">
    <h1>Clientes</h1>
    <p>
        <a class="text-white-no-decor" href="{{ route('cliente.create') }}"><button class="btn btn-gradient-primary btn-rounded btn-fw">Agregar Cliente</button></a>
    </p>
    <x-tabla :elementos="$clientes" modelo="cliente"/>
</x-layout>