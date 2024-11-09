<x-layout titulo="Todos los libros">
    <h1>Libros</h1>
    <p>
        @can('create', App\Models\Libro::class)
            <a class="text-white-no-decor" href="{{ route('libro.create') }}"><button class="btn btn-gradient-primary btn-rounded btn-fw">Agregar Libro</button></a>
        @endcan
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </p>
    <x-tabla :elementos="$libros" modelo="libro"/>
</x-layout> 