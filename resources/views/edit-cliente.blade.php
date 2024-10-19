<x-layout :titulo="'Editar cliente \'' . $cliente->nombre . ' ' . $cliente->apellido . '\''">
    <h1>Editar Cliente "{{ $cliente->nombre }} {{ $cliente->apellido }}"</h1>
    <a class="text-white-no-decor" href="{{ route('cliente.index') }}">
        <button class="btn btn-gradient-info btn-rounded btn-fw border-bottom-separate">Volver al listado</button>
    </a>
    <br>
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Haz los cambios</h4>
                <form action="{{ route('cliente.update', $cliente) }}" method="POST" class="form-sample">
                    @csrf
                    @method('PATCH')
                    <p class="card-description">Datos del cliente</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="nombre" class="col-sm-3 col-form-label">Nombre:</label>
                                <div class="col-sm-9">
                                    <input id="nombre" name="nombre" value="{{ old('nombre') ?? $cliente->nombre }}" type="text" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="apellido" class="col-sm-3 col-form-label">Apellido:</label>
                                <div class="col-sm-9">
                                    <input id="apellido" name="apellido" value="{{ old('apellido') ?? $cliente->apellido }}" type="text" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email:</label>
                                <div class="col-sm-9">
                                    <input id="email" name="email" value="{{ old('email') ?? $cliente->email }}" type="email" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="telefono" class="col-sm-3 col-form-label">Teléfono:</label>
                                <div class="col-sm-9">
                                    <input id="telefono" name="telefono" value="{{ old('telefono') ?? $cliente->telefono }}" type="text" class="form-control"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="direccion" class="col-sm-3 col-form-label">Dirección:</label>
                                <div class="col-sm-9">
                                    <input id="direccion" name="direccion" value="{{ old('direccion') ?? $cliente->direccion }}" type="text" class="form-control"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <button type="submit" class="btn btn-outline-warning btn-rounded btn-fw">Editar Cliente</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
