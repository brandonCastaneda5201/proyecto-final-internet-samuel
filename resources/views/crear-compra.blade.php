<x-layout titulo="Crear una Compra">
    <h1>Crear Compra</h1>
    <a class="text-white-no-decor" href="{{ route('compra.index') }}">
        <button class="btn btn-gradient-info btn-rounded btn-fw border-bottom-separate">Volver al listado</button>
    </a><br>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Completa el formulario</h4>
                <form action="{{ route('compra.store') }}" method="POST" class="form-sample">
                    @csrf
                    <p class="card-description">Para crear una compra</p>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="user_id" class="col-sm-3 col-form-label">Usuario:</label>
                                <div class="col-sm-9">
                                    <select id="user_id" name="user_id" class="form-control">
                                        <option value="">Selecciona un usuario</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="libro_id" class="col-sm-3 col-form-label">Libro:</label>
                                <div class="col-sm-9">
                                    <select id="libro_id" name="libro_id" class="form-control">
                                        <option value="">Selecciona un libro</option>
                                        @foreach($libros as $libro)
                                            <option value="{{ $libro->id }}" {{ old('libro_id') == $libro->id ? 'selected' : '' }}>{{ $libro->titulo }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="precio" class="col-sm-3 col-form-label">Precio:</label>
                                <div class="col-sm-9">
                                    <input id="precio" name="precio" value="{{ old('precio') }}" type="number" step="0.01" class="form-control" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="stock" class="col-sm-3 col-form-label">Stock:</label>
                                <div class="col-sm-9">
                                    <input id="stock" name="stock" value="{{ old('stock') }}" type="number" min="1" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="estado" class="col-sm-3 col-form-label">Estado:</label>
                                <div class="col-sm-9">
                                    <select id="estado" name="estado" class="form-control">
                                        <option value="">Selecciona un estado</option>
                                        <option value="cancelado" {{ old('estado') == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                                        <option value="completado" {{ old('estado') == 'completado' ? 'selected' : '' }}>Completado</option>
                                        <option value="pagado" {{ old('estado') == 'pagado' ? 'selected' : '' }}>Pagado</option>
                                        <option value="reservado" {{ old('estado') == 'reservado' ? 'selected' : '' }}>Reservado</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="fecha_cambio_estado" class="col-sm-3 col-form-label">Fecha de cambio:</label>
                                <div class="col-sm-9">
                                    <input id="fecha_cambio_estado" name="fecha_cambio_estado" value="{{ old('fecha_cambio_estado') }}" type="date" class="form-control" />
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
                    
                    <button type="submit" class="btn btn-outline-primary btn-rounded btn-fw">Agregar Compra</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
