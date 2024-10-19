<div class="main-panel full-width">
    <div class="content-wrapper no-padding">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body overflow-scrollable-x">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    {{-- Si el modelo es libro, renderizar la tabla de libros --}}
                                    @if($modelo == "libro")
                                        <th>ID</th>
                                        <th>Título</th>
                                        <th>Autor</th>
                                        <th>Editorial</th>
                                        <th>Edición</th>
                                        <th>Sinopsis</th>
                                        <th>Stock</th>
                                        <th>Fecha de Publicación</th>
                                        <th>Páginas</th>
                                        <th>Etiquetas</th>
                                        <th>Editar</th>
                                        <th>Ver detalles</th>
                                        <th>Borrar</th>
                                    @endif

                                    {{-- Si el modelo es etiqueta, renderizar la tabla de etiquetas --}}
                                    @if($modelo == "etiqueta")
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Editar</th>
                                        <th>Borrar</th>
                                    @endif

                                    {{-- Si el modelo es cliente, renderizar la tabla de clientes --}}
                                    @if($modelo == "cliente")
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Email</th>
                                        <th>Teléfono</th>
                                        <th>Dirección</th>
                                        <th>Editar</th>
                                        <th>Ver detalles</th>
                                        <th>Borrar</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Renderizar los libros si el modelo es libro --}}
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
                                            <td>
                                                @foreach($libro->etiquetas as $etiqueta)
                                                    {{ $etiqueta->nombre }},
                                                @endforeach
                                            </td>
                                            <td><a href="{{ route('libro.edit', $libro) }}"><button class="btn btn-outline-warning btn-rounded py-2 px-3">Editar</button></a></td>
                                            <td><a href="{{ route('libro.show', $libro) }}"><button class="btn btn-outline-success btn-rounded py-2 px-3">Ver detalles</button></a></td>
                                            <td>
                                                <form action="{{ route('libro.destroy', $libro) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-rounded py-2 px-3">Borrar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                                {{-- Renderizar las etiquetas si el modelo es etiqueta --}}
                                @if($modelo == "etiqueta")
                                    @foreach($elementos as $etiqueta)
                                        <tr>
                                            <td>{{ $etiqueta->id }}</td>
                                            <td>{{ $etiqueta->nombre }}</td>
                                            <td><a href="{{ route('etiqueta.edit', $etiqueta) }}"><button class="btn btn-outline-warning btn-rounded py-2 px-3">Editar</button></a></td>
                                            <td>
                                                <form action="{{ route('etiqueta.destroy', $etiqueta) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-rounded py-2 px-3">Borrar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                                {{-- Renderizar los clientes si el modelo es cliente --}}
                                @if($modelo == "cliente")
                                    @foreach($elementos as $cliente)
                                        <tr>
                                            <td>{{ $cliente->id }}</td>
                                            <td>{{ $cliente->nombre }}</td>
                                            <td>{{ $cliente->apellido }}</td>
                                            <td>{{ $cliente->email }}</td>
                                            <td>{{ $cliente->telefono }}</td>
                                            <td>{{ $cliente->direccion }}</td>
                                            <td><a href="{{ route('cliente.edit', $cliente) }}"><button class="btn btn-outline-warning btn-rounded py-2 px-3">Editar</button></a></td>
                                            <td><a href="{{ route('cliente.show', $cliente) }}"><button class="btn btn-outline-success btn-rounded py-2 px-3">Ver detalles</button></a></td>
                                            <td>
                                                <form action="{{ route('cliente.destroy', $cliente) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-rounded py-2 px-3">Borrar</button>
                                                </form>
                                            </td>
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
