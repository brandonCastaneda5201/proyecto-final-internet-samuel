<x-layout :titulo="'Editar libro \'' . $libro->titulo . '\''">
    <h1>Editar Libro "{{$libro->titulo}}"</h1>
    <a class="text-white-no-decor" href="{{ route('libro.index') }}"><button class="btn btn-gradient-info btn-rounded btn-fw border-bottom-separate">Volver al listado</button></a><br>
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Haz los cambios</h4>
            <form action="{{ route('libro.update', $libro) }}" method="POST" class="form-sample">
                @csrf
                @method('PATCH')
                <p class="card-description">Necesarios del libro</p>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                    <label for="titulo" class="col-sm-3 col-form-label">Titulo:</label>
                    <div class="col-sm-9">
                        <input id="titulo" name="titulo" value="{{ old('titulo') ?? $libro->titulo }}" type="text" class="form-control" />
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                    <label for="autor" class="col-sm-3 col-form-label">Autor:</label>
                    <div class="col-sm-9">
                        <input id="autor" name="autor" value="{{ old('autor') ?? $libro->autor }}" type="text" class="form-control" />
                    </div>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                    <label for="editorial" class="col-sm-3 col-form-label">Editorial:</label>
                    <div class="col-sm-9">
                        <input id="editorial" name="editorial" value="{{ old('editorial') ?? $libro->editorial }}" type="text" class="form-control"/>
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                    <label for="fecha_publicacion" class="col-sm-3 col-form-label">Fecha de publicacion:</label>
                    <div class="col-sm-9">
                        <input id="fecha_publicacion" name="fecha_publicacion" value="{{ old('fecha_publicacion') ?? $libro->fecha_publicacion }}" type="date" class="form-control" placeholder="dd/mm/yyyy" />
                    </div>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                    <label for="edicion" class="col-sm-3 col-form-label">Edicion:</label>
                    <div class="col-sm-9">
                        <input id="edicion" name="edicion" value="{{ old('edicion') ?? $libro->edicion }}" type="text" class="form-control"/>
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                    <label for="stock" class="col-sm-3 col-form-label">Stock:</label>
                    <div class="col-sm-9">
                        <input id="stock" name="stock" value="{{ old('stock') ?? $libro->stock }}" type="number" class="form-control"/>
                    </div>
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group row">
                        <label for="sinopsis" class="col-form-label col-sm-3">Sinopsis:</label>
                        <div class="col-sm-9">
                            <textarea id="sinopsis" name="sinopsis" rows="8" class="form-control full-width">{{ old('sinopsis') ?? $libro->sinopsis }}</textarea>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                        <label for="paginas" class="col-sm-3 col-form-label">Paginas:</label>
                        <div class="col-sm-9">
                            <input id="paginas" name="paginas" value="{{ old('paginas') ?? $libro->paginas }}" type="number" class="form-control"/>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group row">
                        <label for="etiquetas" class="col-form-label col-sm-3">Etiquetas:</label>
                        <div class="col-sm-9">
                            <select id="etiquetas" name="etiquetas[]" rows="8" class="form-control full-width" multiple>
                                @foreach ($etiquetas as $etiqueta)
                                    <option value="{{ $etiqueta->id }}" @if(in_array($etiqueta->id, $libro->etiquetas->pluck('id')->toArray())) selected @endif>
                                        {{ $etiqueta->nombre }}
                                    </option>
                                @endforeach
                            </select>
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
                <button type="submit" class="btn btn-outline-warning btn-rounded btn-fw">Editar Libro</button>
            </form>
            </div>
        </div>
        </div>
</x-layout>