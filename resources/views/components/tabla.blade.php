<div class="main-panel full-width">
    <div class="content-wrapper no-padding">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body overflow-scrollable-x">
            <table class="table table-striped">
                <thead>

                <tr>
                    {{-- Si el modelo es libro, renderizar el resultado --}}
                    @if($modelo == "libro")
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
                    @endif
                </tr>
                </thead>
                <tbody>
                    @if($modelo == "libro")
                        @foreach($elementos as $libro)
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
                    @endif
                </tbody>
            </table>
            </div>
        </div>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
    </div>
    </div>
</div>