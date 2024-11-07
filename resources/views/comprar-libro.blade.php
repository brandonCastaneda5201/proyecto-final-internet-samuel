<x-layout titulo="Crear un cliente">
    <h1>Comprar Libro</h1>
    <a class="text-white-no-decor" href="{{ route('libro.index') }}">
        <button class="btn btn-gradient-info btn-rounded btn-fw border-bottom-separate">Volver al listado</button>
    </a><br>
    
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Completa el formulario</h4>
                <form action="{{ route('libro.crear-compra', $libro) }}" method="POST" class="form-sample">
                    @csrf
                    <p class="card-description">Para comprar un libro</p>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="stock" class="col-sm-3 col-form-label">Cantidad a comprar (DISPONIBLE: {{ $libro->stock }}):</label>
                                <div class="col-sm-9">
                                    <input id="stock" name="stock" value="{{ old('stock') }}" type="text" class="form-control" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="method_pay" class="col-sm-3 col-form-label">Metodo de pago:</label>
                                <div class="col-sm-9">
                                    <select id="method_pay" name="method_pay" value="{{ old('method_pay') }}" type="text" class="form-control">
                                        <option default value="tarjeta_bancaria">Tarjeta bancaria</option>
                                        <option value="efectivo">Efectivo</option>
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
                    
                    <button type="submit" class="btn btn-outline-primary btn-rounded btn-fw">Comprar Libro</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
