<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalle del libro "{{ $libro->titulo }}"</title>
</head>
<body>
    <h1>{{ $libro->titulo }}</h1>
    <p>
        {{ $libro->sinopsis }}
    </p>
    <p>
        <ul>
            <li>Fecha de publicacion: {{ $libro->fecha_publicacion }}</li>
            <li>Autor: {{ $libro->autor }}</li>
            <li>Editorial: {{ $libro->editorial }}</li>
            <li>Edicion: {{ $libro->edicion }}</li>
            <li>Paginas: {{ $libro->paginas }}</li>
            <li>Stock: {{ $libro->stock }}</li>
        </ul>
    </p>
    <a href="{{ route('libro.edit', $libro) }}">Editar</a><br>

    <form action="{{ route('libro.destroy', $libro) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Borrar">
    </form>
</body>
</html>