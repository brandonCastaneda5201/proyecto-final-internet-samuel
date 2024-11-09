<x-layout titulo="Todos los permisos">
    <h1>Permisos</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <x-tabla :elementos="$permisos" modelo="permiso"/>
</x-layout>