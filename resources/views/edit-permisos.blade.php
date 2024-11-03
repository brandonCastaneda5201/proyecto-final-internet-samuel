<x-layout :titulo="'Editar usuario \'' . $permiso->user->name . ' ' . $permiso->user->apellido . '\''">
    <h1>Editar Permisos de "{{ $permiso->user->name }} {{ $permiso->user->apellido }}"</h1>
    <a class="text-white-no-decor" href="{{ route('permiso.index') }}">
        <button class="btn btn-gradient-info btn-rounded btn-fw border-bottom-separate">Volver al listado</button>
    </a>
    <br>
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Haz los cambios</h4>
                <form action="{{ route('permiso.update', $permiso) }}" method="POST" class="form-sample">
                    @csrf
                    @method('PATCH')
                    <p class="card-description">Permisos del cliente/usuario</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check form-group row">
                                <label class="form-check-label">
                                    <input type="checkbox" id="show-libro" name="show-libro" value="1" @if(old('show-libro', $permiso->getAttribute('show-libro'))) checked @endif class="form-check-input"> Ver Libros <i class="input-helper"></i>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check form-group row">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="create-libro" value="1" @if(old('create-libro', $permiso->getAttribute('create-libro'))) checked @endif> Crear Libros <i class="input-helper"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check form-group row">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="edit-libro" value="1" @if(old('edit-libro', $permiso->getAttribute('edit-libro'))) checked @endif> Editar Libros <i class="input-helper"></i>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check form-group row">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="delete-libro" value="1" @if(old('delete-libro', $permiso->getAttribute('delete-libro'))) checked @endif> Borrar Libros <i class="input-helper"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check form-check-info form-group row">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="show-etiqueta" name="show-etiqueta" value="1" @if(old('show-etiqueta', $permiso->getAttribute('show-etiqueta'))) checked @endif> Ver Etiquetas <i class="input-helper"></i>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check form-check-info form-group row">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="create-etiqueta" name="create-etiqueta" value="1" @if(old('create-etiqueta', $permiso->getAttribute('create-etiqueta'))) checked @endif> Crear Etiquetas <i class="input-helper"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check form-check-info form-group row">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="edit-etiqueta" name="edit-etiqueta" value="1" @if(old('edit-etiqueta', $permiso->getAttribute('edit-etiqueta'))) checked @endif> Editar Etiquetas <i class="input-helper"></i>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check form-check-info form-group row">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="delete-etiqueta" name="delete-etiqueta" value="1" @if(old('delete-etiqueta', $permiso->getAttribute('delete-etiqueta'))) checked @endif> Borrar Etiquetas <i class="input-helper"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check form-check-success form-group row">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="show-compra" name="show-compra" value="1" @if(old('show-compra', $permiso->getAttribute('show-compra'))) checked @endif> Ver Compras <i class="input-helper"></i>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check form-check-success form-group row">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="create-compra" name="create-compra" value="1" @if(old('create-compra', $permiso->getAttribute('create-compra'))) checked @endif> Crear Compras <i class="input-helper"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check form-check-success form-group row">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="edit-compra" name="edit-compra" value="1" @if(old('edit-compra', $permiso->getAttribute('edit-compra'))) checked @endif> Editar Compras <i class="input-helper"></i>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check form-check-success form-group row">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="delete-compra" name="delete-compra" value="1" @if(old('delete-compra', $permiso->getAttribute('delete-compra'))) checked @endif> Borrar Compras <i class="input-helper"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check form-check-danger form-group row">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="show-cliente" name="show-cliente" value="1" @if(old('show-cliente', $permiso->getAttribute('show-cliente'))) checked @endif> Ver Clientes <i class="input-helper"></i>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check form-check-danger form-group row">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="create-cliente" name="create-cliente" value="1" @if(old('create-cliente', $permiso->getAttribute('create-cliente'))) checked @endif> Crear Clientes <i class="input-helper"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check form-check-danger form-group row">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="edit-cliente" name="edit-cliente" value="1" @if(old('edit-cliente', $permiso->getAttribute('edit-cliente'))) checked @endif> Editar Clientes <i class="input-helper"></i>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check form-check-danger form-group row">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="delete-cliente" name="delete-cliente" value="1" @if(old('delete-cliente', $permiso->getAttribute('delete-cliente'))) checked @endif> Borrar Clientes <i class="input-helper"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check form-check-warning form-group row">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="show-permiso" name="show-permiso" value="1" @if(old('show-permiso', $permiso->getAttribute('show-permiso'))) checked @endif> Ver Permisos <i class="input-helper"></i>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check form-check-warning form-group row">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="edit-permiso" name="edit-permiso" value="1" @if(old('edit-permiso', $permiso->getAttribute('edit-permiso'))) checked @endif> Editar Permisos <i class="input-helper"></i>
                                </label>
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

                    <button type="submit" class="btn btn-outline-warning btn-rounded btn-fw">Editar Permisos</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
