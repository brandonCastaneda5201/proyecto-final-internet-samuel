<h1>Se publico un nuevo libro</h1>
<h3>Yes {{$libro->titulo}}</h3>
<ul class="libro-detalles">
            <li>Fecha de publicacion: {{ $libro->fecha_publicacion }}</li>
            <li>Autor: {{ $libro->autor }}</li>
            <li>Editorial: {{ $libro->editorial }}</li>
            <li>Edicion: {{ $libro->edicion }}</li>
            <li>Paginas: {{ $libro->paginas }}</li>
            <li>Stock: {{ $libro->stock }}</li>
            <span>Etiquetas: </span>
            @foreach ($libro->etiquetas as $etiqueta)
                <li value="{{ $etiqueta->id }}">
                    {{ $etiqueta->nombre }}
                </li>
            @endforeach
</ul>