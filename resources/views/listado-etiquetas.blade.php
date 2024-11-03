<x-layout titulo="Todas las etiquetas">
    <h1>Etiquetas</h1>
    <p>
        @can('create', App\Models\Etiqueta::class)
            <a class="text-white-no-decor" href="{{ route('etiqueta.create') }}"><button class="btn btn-gradient-primary btn-rounded btn-fw">Agregar Etiqueta</button></a>
        @endcan
    </p>
    <x-tabla :elementos="$etiquetas" modelo="etiqueta"/>
</x-layout>