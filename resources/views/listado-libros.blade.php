<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todos los libros</title>
</head>
<body>
    <h1>Libros</h1>
    <p>
        <a href="{{ route('libro.create') }}">Agregar Libro</a>
    </p>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Editorial</th>
                <th>Edicion</th>
                <th>Sinopsis</th>
                <th>Stock</th>
                <th>Fecha de Publicacion</th>
                <th>Paginas</th>
                <th>Editar</th>
                <th>Ver detalles</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($libros as $libro)
            <tr>
                <td>{{ $libro->id }}</td>
                <td>{{ $libro->titulo }}</td>
                <td>{{ $libro->autor }}</td>
                <td>{{ $libro->editorial }}</td>
                <td>{{ $libro->edicion }}</td>
                <td>{{ $libro->sinopsis }}</td>
                <td>{{ $libro->stock }}</td>
                <td>{{ $libro->fecha_publicacion }}</td>
                <td>{{ $libro->paginas }}</td>
                <td><a href="{{ route('libro.edit', $libro) }}">Editar</a></td>
                <td><a href="{{ route('libro.show', $libro) }}">Ver</a></td>
                <td>    <form action="{{ route('libro.destroy', $libro) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Borrar">
                        </form></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>