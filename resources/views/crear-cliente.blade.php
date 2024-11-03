<x-layout titulo="Crear un cliente">
    <h1>Crear Cliente</h1>
    <a class="text-white-no-decor" href="{{ route('cliente.index') }}">
        <button class="btn btn-gradient-info btn-rounded btn-fw border-bottom-separate">Volver al listado</button>
    </a><br>
    
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Completa el formulario</h4>
                <form action="{{ route('cliente.store') }}" method="POST" class="form-sample">
                    @csrf
                    <p class="card-description">Para crear un cliente</p>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Nombre:</label>
                                <div class="col-sm-9">
                                    <input id="name" name="name" value="{{ old('name') }}" type="text" class="form-control" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="apellido" class="col-sm-3 col-form-label">Apellido:</label>
                                <div class="col-sm-9">
                                    <input id="apellido" name="apellido" value="{{ old('apellido') }}" type="text" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email:</label>
                                <div class="col-sm-9">
                                    <input id="email" name="email" value="{{ old('email') }}" type="email" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="telefono" class="col-sm-3 col-form-label">Teléfono:</label>
                                <div class="col-sm-9">
                                    <input id="telefono" name="telefono" value="{{ old('telefono') }}" type="text" class="form-control"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="direccion" class="col-sm-3 col-form-label">Dirección:</label>
                                <div class="col-sm-9">
                                    <input id="direccion" name="direccion" value="{{ old('direccion') }}" type="text" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="password" class="col-sm-3 col-form-label">Contraseña:</label>
                                <div class="col-sm-9">
                                    <input id="password" name="password" value="{{ old('password') }}" type="text" class="form-control" />
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
                    
                    <button type="submit" class="btn btn-outline-primary btn-rounded btn-fw">Agregar Cliente</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
