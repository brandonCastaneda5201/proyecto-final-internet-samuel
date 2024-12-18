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
                                        <th>Precio</th>
                                        <th>Etiquetas</th>
                                        <th>Acciones</th>
                                    @endif

                                    {{-- Si el modelo es etiqueta, renderizar la tabla de etiquetas --}}
                                    @if($modelo == "etiqueta")
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Acciones</th>
                                    @endif

                                    {{-- Si el modelo es cliente, renderizar la tabla de clientes --}}
                                    @if($modelo == "cliente")
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Email</th>
                                        <th>Teléfono</th>
                                        <th>Dirección</th>
                                        <th>Acciones</th>
                                    @endif

                                    {{-- Si el modelo es cliente, renderizar la tabla de clientes --}}
                                    @if($modelo == "compra")
                                        <th>ID</th>
                                        <th>Usuario</th>
                                        <th>Libro</th>
                                        <th>Precio final</th>
                                        <th>Stock solicitado</th>
                                        <th>Estado</th>
                                        <th>Fecha actualizado</th>
                                        <th>Acciones</th>
                                    @endif

                                    @if($modelo == "permiso")
                                        <th>ID</th>
                                        <th>ID del usuario</th>
                                        <th>Nombre Completo</th>
                                        <th>Clientes:R</th>
                                        <th>Clientes:C</th>
                                        <th>Clientes:U</th>
                                        <th>Clientes:D</th>
                                        <th>Compras:R</th>
                                        <th>Compras:C</th>
                                        <th>Compras:U</th>
                                        <th>Compras:D</th>
                                        <th>Permisos:R</th>
                                        <th>Permisos:U</th>
                                        <th>Libros:R</th>
                                        <th>Libros:C</th>
                                        <th>Libros:U</th>
                                        <th>Libros:D</th>
                                        <th>Etiquetas:R</th>
                                        <th>Etiquetas:C</th>
                                        <th>Etiquetas:U</th>
                                        <th>Etiquetas:D</th>
                                        <th>Compra:Libros</th>
                                        <th>Acciones</th>
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
                                            <td>{{ $libro->precio }}</td>
                                            <td>
                                                @foreach($libro->etiquetas as $etiqueta)
                                                    {{ $etiqueta->nombre }},
                                                @endforeach
                                            </td>
                                            <td>
                                            @if($libro->stock > 0)
                                                @can('comprar', $libro)
                                                    <a href="{{ route('libro.comprar', $libro->id) }}"><button class="btn btn-outline-info btn-rounded py-2 px-3">Comprar</button></a>
                                                @endcan
                                            @endif
                                            @can('edit', $libro)   
                                                <a href="{{ route('libro.edit', $libro) }}"><button class="btn btn-outline-warning btn-rounded py-2 px-3">Editar</button></a>
                                            @endif
                                                <a href="{{ route('libro.show', $libro) }}"><button class="btn btn-outline-success btn-rounded py-2 px-3">Ver detalles</button></a>
                                            @can('delete', $libro) 
                                                <form action="{{ route('libro.destroy', $libro) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-rounded py-2 px-3">Borrar</button>
                                                </form>
                                            @endcan
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
                                            <td> 
                                                @can('update', $etiqueta)
                                                    <a href="{{ route('etiqueta.edit', $etiqueta) }}"><button class="btn btn-outline-warning btn-rounded py-2 px-3">Editar</button></a>
                                                @endcan
                                                @can('delete', $etiqueta)
                                                    <form action="{{ route('etiqueta.destroy', $etiqueta) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger btn-rounded py-2 px-3">Borrar</button>
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                                {{-- Renderizar los clientes si el modelo es cliente --}}
                                @if($modelo == "cliente")
                                    @foreach($elementos as $cliente)
                                        <tr>
                                            <td>{{ $cliente->id }}</td>
                                            <td>{{ $cliente->name }}</td>
                                            <td>{{ $cliente->apellido }}</td>
                                            <td>{{ $cliente->email }}</td>
                                            <td>{{ $cliente->telefono }}</td>
                                            <td>{{ $cliente->direccion }}</td>
                                            <td>
                                                @can('update', $cliente)
                                                    <a href="{{ route('cliente.edit', $cliente) }}"><button class="btn btn-outline-warning btn-rounded py-2 px-3">Editar</button></a>
                                                @endcan
                                                @can('view', $cliente)
                                                    <a href="{{ route('cliente.show', $cliente) }}"><button class="btn btn-outline-success btn-rounded py-2 px-3">Ver detalles</button></a>
                                                @endcan
                                                @can('delete', $cliente)
                                                    <form action="{{ route('cliente.destroy', $cliente) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger btn-rounded py-2 px-3">Borrar</button>
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                {{-- Renderizar las compras si el modelo es compra --}}
                                    @if($modelo == "compra")
                                        @foreach($elementos as $compra)
                                            <tr>
                                                <td>{{ $compra->id }}</td>
                                                <td>{{ $compra->user->name }} {{ $compra->user->apellido }}</td>
                                                <td>{{ $compra->libro->titulo }}</td>
                                                <td>${{ number_format($compra->precio, 2) }}</td>
                                                <td>{{ $compra->stock }}</td>
                                                <td>{{ ucfirst($compra->estado) }}</td>
                                                <td>{{ $compra->fecha_cambio_estado ? \Carbon\Carbon::parse($compra->fecha_cambio_estado)->format('d/m/Y') : 'No disponible' }}</td>

                                                <td>
                                                    @can('update', $compra)
                                                        <a href="{{ route('compra.edit', $compra) }}">
                                                            <button class="btn btn-outline-warning btn-rounded py-2 px-3">Editar</button>
                                                        </a>
                                                    @endcan
                                                    @auth
                                                        <a href="{{ route('compra.show', $compra) }}">
                                                            <button class="btn btn-outline-success btn-rounded py-2 px-3">Ver detalles</button>
                                                        </a>
                                                    @endauth
                                                    @cannot('update', $compra)
                                                        @if($compra->user_id == $user->id && $compra->estado == "reservado")
                                                            <form action="{{ route('compra.cancelar-compra', $compra) }}" method="POST" style="display:inline;">
                                                                @csrf
                                                                <button class="btn btn-outline-secondary btn-rounded py-2 px-3">Cancelar</button>
                                                            </form>
                                                        @endif
                                                    @endcannot
                                                    @can('delete', $compra)
                                                        <form action="{{ route('compra.destroy', $compra) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-outline-danger btn-rounded py-2 px-3">Borrar</button>
                                                        </form>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                {{-- Renderizar los permisos si el modelo es permiso --}}
                                @if($modelo == "permiso")
                                    @foreach($elementos as $permiso)
                                        <tr>
                                            <td>{{ $permiso->id }}</td>
                                            <td>{{ $permiso->user->id }}</td>
                                            <td>{{ $permiso->user->name }} {{ $permiso->user->apellido }}</td>
                                            {{-- Clientes --}}
                                            <td>
                                                @if($permiso->getAttribute('show-cliente')) 
                                                    <i class="fa fa-check-circle text-success"></i>
                                                @else
                                                    <i class="fa fa-times text-danger"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if($permiso->getAttribute('create-cliente')) 
                                                    <i class="fa fa-check-circle text-success"></i>
                                                @else
                                                    <i class="fa fa-times text-danger"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if($permiso->getAttribute('edit-cliente')) 
                                                    <i class="fa fa-check-circle text-success"></i>
                                                @else
                                                    <i class="fa fa-times text-danger"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if($permiso->getAttribute('delete-cliente')) 
                                                    <i class="fa fa-check-circle text-success"></i>
                                                @else
                                                    <i class="fa fa-times text-danger"></i>
                                                @endif
                                            </td>
                                            {{-- Compras --}}
                                            <td>
                                                @if($permiso->getAttribute('show-compra')) 
                                                    <i class="fa fa-check-circle text-success"></i>
                                                @else
                                                    <i class="fa fa-times text-danger"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if($permiso->getAttribute('create-compra')) 
                                                    <i class="fa fa-check-circle text-success"></i>
                                                @else
                                                    <i class="fa fa-times text-danger"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if($permiso->getAttribute('edit-compra')) 
                                                    <i class="fa fa-check-circle text-success"></i>
                                                @else
                                                    <i class="fa fa-times text-danger"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if($permiso->getAttribute('delete-compra')) 
                                                    <i class="fa fa-check-circle text-success"></i>
                                                @else
                                                    <i class="fa fa-times text-danger"></i>
                                                @endif
                                            </td>
                                            {{-- Permisos --}}
                                            <td>
                                                @if($permiso->getAttribute('show-permiso')) 
                                                    <i class="fa fa-check-circle text-success"></i>
                                                @else
                                                    <i class="fa fa-times text-danger"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if($permiso->getAttribute('edit-permiso')) 
                                                    <i class="fa fa-check-circle text-success"></i>
                                                @else
                                                    <i class="fa fa-times text-danger"></i>
                                                @endif
                                            </td>
                                            {{-- Libros --}}
                                            <td>
                                                @if($permiso->getAttribute('show-libro')) 
                                                    <i class="fa fa-check-circle text-success"></i>
                                                @else
                                                    <i class="fa fa-times text-danger"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if($permiso->getAttribute('create-libro')) 
                                                    <i class="fa fa-check-circle text-success"></i>
                                                @else
                                                    <i class="fa fa-times text-danger"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if($permiso->getAttribute('edit-libro')) 
                                                    <i class="fa fa-check-circle text-success"></i>
                                                @else
                                                    <i class="fa fa-times text-danger"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if($permiso->getAttribute('delete-libro')) 
                                                    <i class="fa fa-check-circle text-success"></i>
                                                @else
                                                    <i class="fa fa-times text-danger"></i>
                                                @endif
                                            </td>
                                            {{-- Etiquetas --}}
                                            <td>
                                                @if($permiso->getAttribute('show-etiqueta')) 
                                                    <i class="fa fa-check-circle text-success"></i>
                                                @else
                                                    <i class="fa fa-times text-danger"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if($permiso->getAttribute('create-etiqueta')) 
                                                    <i class="fa fa-check-circle text-success"></i>
                                                @else
                                                    <i class="fa fa-times text-danger"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if($permiso->getAttribute('edit-etiqueta')) 
                                                    <i class="fa fa-check-circle text-success"></i>
                                                @else
                                                    <i class="fa fa-times text-danger"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if($permiso->getAttribute('delete-etiqueta')) 
                                                    <i class="fa fa-check-circle text-success"></i>
                                                @else
                                                    <i class="fa fa-times text-danger"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if($permiso->getAttribute('compra-libro')) 
                                                    <i class="fa fa-check-circle text-success"></i>
                                                @else
                                                    <i class="fa fa-times text-danger"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @can('update', $permiso)
                                                    <a href="{{ route('permiso.edit', $permiso) }}"><button class="btn btn-outline-warning btn-rounded py-2 px-3">Editar</button></a>
                                                @endcan
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
