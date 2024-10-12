<x-layout titulo="Crear una etiqueta">
    <h1>Crear Etiqueta</h1>
    <a class="text-white-no-decor" href="{{ route('etiqueta.index') }}"><button class="btn btn-gradient-info btn-rounded btn-fw border-bottom-separate">Volver al listado</button></a><br>
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Completa el formulario</h4>
            <form action="{{ route('etiqueta.store') }}" method="POST" class="form-sample">
                @csrf
                <p class="card-description">Para crear una etiqueta</p>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                    <label for="nombre" class="col-sm-3 col-form-label">Nombre:</label>
                    <div class="col-sm-9">
                        <input id="nombre" name="nombre" value="{{ old('nombre') }}" type="text" class="form-control" />
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
                </div>
                <button type="submit" class="btn btn-outline-primary btn-rounded btn-fw">Agregar Etiqueta</button>
            </form>
            </div>
        </div>
        </div>
</x-layout>