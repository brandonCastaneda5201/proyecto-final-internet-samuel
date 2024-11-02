<x-layout :titulo="'Libro: ' . $libro->titulo">
    <h1>{{ $libro->titulo }}</h1>
    @if($libro->archivo)
    <img src="{{ Storage::url($libro->archivo->ruta) }}" />
    @endif
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
            <span>Etiquetas: </span>
            @foreach ($libro->etiquetas as $etiqueta)
                <li value="{{ $etiqueta->id }}">
                    {{ $etiqueta->nombre }}
                </li>
            @endforeach
        </ul>
    </p>
    <a href="{{ route('libro.index') }}"><button class="btn btn-gradient-info btn-rounded btn-fw mb-2">Volver a todos los libros</button></a><br>
    @can('edit', App\Models\Libro::class)
        <a href="{{ route('libro.edit', $libro) }}"><button class="btn btn-gradient-warning btn-rounded btn-fw">Editar</button></a><br>
    @endcan
</x-layout>