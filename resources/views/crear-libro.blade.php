<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Libro</title>
</head>
<body>
    <h1>Crear Libro</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('libro.store') }}" method="POST">
        @csrf

        <label for="titulo">Titulo del libro:</label><br>
        <input type="text" name="titulo" value="{{ old('titulo') }}"><br>

        <label for="autor">Autor:</label><br>
        <input type="text" name="autor" value="{{ old('autor') }}"><br>

        <label for="editorial">Editorial:</label><br>
        <input type="text" name="editorial" value="{{ old('editorial') }}"><br>

        <label for="edicion">Edicion:</label><br>
        <input type="text" name="edicion" value="{{ old('edicion') }}"><br>

        <label for="sinopsis">Sinopsis:</label><br>
        <textarea name="sinopsis" value="{{ old('sinopsis') }}"></textarea><br>

        <label for="stock">Stock:</label><br>
        <input type="number" name="stock" value="{{ old('stock') }}"><br>

        <label for="paginas">Paginas:</label><br>
        <input type="number" name="paginas" value="{{ old('paginas') }}"><br>
        
        <label for="fecha_publicacion">Fecha de publicacion:</label><br>
        <input type="date" name="fecha_publicacion" id="fecha_publicacion" value="{{ old('fecha_publicacion') }}">

        <input type="submit" value="Enviar">
    </form>
</body>
</html>