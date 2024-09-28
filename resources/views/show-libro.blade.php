<x-layout :titulo="'Libro: ' . $libro->titulo">
    <h1>{{ $libro->titulo }}</h1>
    <p>
        {{ $libro->sinopsis }}
    </p>
    <p>
        <ul class="libro-detalles">
            <li>Fecha de publicacion: {{ $libro->fecha_publicacion }}</li>
            <li>Autor: {{ $libro->autor }}</li>
            <li>Editorial: {{ $libro->editorial }}</li>
            <li>Edicion: {{ $libro->edicion }}</li>
            <li>Paginas: {{ $libro->paginas }}</li>
            <li>Stock: {{ $libro->stock }}</li>
        </ul>
    </p>
    <a href="{{ route('libro.index') }}"><button class="btn btn-gradient-info btn-rounded btn-fw mb-2">Volver a todos los libros</button></a><br>
    <a href="{{ route('libro.edit', $libro) }}"><button class="btn btn-gradient-warning btn-rounded btn-fw">Editar</button></a><br>
</x-layout>