<x-layout>
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
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Completa el formulario</h4>
            <form action="{{ route('libro.store') }}" method="POST" class="form-sample">
                @csrf
                <p class="card-description">Para crear un libro</p>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                    <label for="titulo" class="col-sm-3 col-form-label">Titulo:</label>
                    <div class="col-sm-9">
                        <input id="titulo" name="titulo" value="{{ old('titulo') }}" type="text" class="form-control" />
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                    <label for="autor" class="col-sm-3 col-form-label">Autor:</label>
                    <div class="col-sm-9">
                        <input id="autor" name="autor" value="{{ old('autor') }}" type="text" class="form-control" />
                    </div>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                    <label for="editorial" class="col-sm-3 col-form-label">Editorial:</label>
                    <div class="col-sm-9">
                        <input id="editorial" name="editorial" value="{{ old('editorial') }}" type="text" class="form-control"/>
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                    <label for="fecha_publicacion" class="col-sm-3 col-form-label">Fecha de publicacion:</label>
                    <div class="col-sm-9">
                        <input id="fecha_publicacion" name="fecha_publicacion" value="{{ old('fecha_publicacion') }}" type="date" class="form-control" placeholder="dd/mm/yyyy" />
                    </div>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                    <label for="edicion" class="col-sm-3 col-form-label">Edicion:</label>
                    <div class="col-sm-9">
                        <input id="edicion" name="edicion" value="{{ old('edicion') }}" type="text" class="form-control"/>
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                    <label for="stock" class="col-sm-3 col-form-label">Stock:</label>
                    <div class="col-sm-9">
                        <input id="stock" name="stock" value="{{ old('stock') }}" type="number" class="form-control"/>
                    </div>
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                        <label for="paginas" class="col-sm-3 col-form-label">Paginas:</label>
                        <div class="col-sm-9">
                            <input id="paginas" name="paginas" value="{{ old('paginas') }}" type="number" class="form-control"/>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group row">
                        <label for="sinopsis" class="col-form-label col-sm-3">Sinopsis:</label>
                        <div class="col-sm-9">
                            <textarea id="sinopsis" name="sinopsis" value="{{ old('sinopsis') }}" rows="8" class="form-control full-width"></textarea>
                        </div>
                    </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
        </div>
</x-layout>