<x-layout titulo="Todos los libros">
    <h1>Etiquetas</h1>
    <p>
        <a class="text-white-no-decor" href="{{ route('etiqueta.create') }}"><button class="btn btn-gradient-primary btn-rounded btn-fw">Agregar Etiqueta</button></a>
    </p>
    <x-tabla :elementos="$etiquetas" modelo="etiqueta"/>
</x-layout>