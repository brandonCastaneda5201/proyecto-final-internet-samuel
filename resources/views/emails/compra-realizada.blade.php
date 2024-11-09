<x-mail::message>
# Gracias por comprar en nuestra tienda virtual, has comprado este libro:
## ID de la compra: {{ $compra->id }}
## Libro comprado: {{ $compra->libro->titulo }}
<x-mail::panel>
Sinopsis: {{ $compra->libro->sinopsis }}
</x-mail::panel> 
<x-mail::button :url="route('compra.index')">
Ver mis compras
</x-mail::button>
Gracias,<br>
{{ config('app.name') }}
</x-mail::message>