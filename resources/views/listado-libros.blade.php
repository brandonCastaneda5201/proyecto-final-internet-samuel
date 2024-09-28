<x-layout>
    <h1>Libros</h1>
    <p>
        <a class="text-white-no-decor" href="{{ route('libro.create') }}"><button class="btn btn-gradient-primary btn-rounded btn-fw">Agregar Libro</button></a>
    </p>
    <x-tabla :elementos="$libros" modelo="libro"/>
</x-layout>