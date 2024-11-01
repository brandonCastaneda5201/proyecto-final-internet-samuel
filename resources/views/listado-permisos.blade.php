<x-layout titulo="Todos los permisos">
    <h1>Permisos</h1>
    <p>
        <a class="text-white-no-decor" href="{{ route('permiso.create') }}"><button class="btn btn-gradient-primary btn-rounded btn-fw">Agregar Permiso</button></a>
    </p>
    <x-tabla :elementos="$permisos" modelo="permiso"/>
</x-layout>