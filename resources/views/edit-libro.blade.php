<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar libro "{{$libro->titulo}}"</title>
</head>
<body>
    <h1>Editar Libro "{{$libro->titulo}}"</h1>

    <form action="{{ route('libro.update', $libro) }}" method="POST">
        @csrf
        
        @method('PATCH')
        <label for="titulo">Titulo del libro:</label><br>
        <input type="text" name="titulo" value="{{ old('titulo') ?? $libro->titulo }}"><br>

        <label for="autor">Autor:</label><br>
        <input type="text" name="autor" value="{{ old('autor') ?? $libro->autor }}"><br>

        <label for="editorial">Editorial:</label><br>
        <input type="text" name="editorial" value="{{ old('editorial') ?? $libro->editorial }}"><br>

        <label for="edicion">Edicion:</label><br>
        <input type="text" name="edicion" value="{{ old('edicion') ?? $libro->edicion }}"><br>

        <label for="sinopsis">Sinopsis:</label><br>
        <textarea name="sinopsis">{{ old('sinopsis') ?? $libro->sinopsis }}</textarea><br>

        <label for="stock">Stock:</label><br>
        <input type="number" name="stock" value="{{ old('stock') ?? $libro->stock }}"><br>

        <label for="paginas">Paginas:</label><br>
        <input type="number" name="paginas" value="{{ old('paginas') ?? $libro->paginas }}"><br>
        
        <label for="fecha_publicacion">Fecha de publicacion:</label><br>
        <input type="date" name="fecha_publicacion" id="fecha_publicacion" value="{{ old('fecha_publicacion') ?? $libro->fecha_publicacion }}">

        <input type="submit" value="Enviar">
    </form>
</body>
</html>