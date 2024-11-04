<x-formulario-cuenta titulo="Verificar correo electronico">
    <div>
    <div class="brand-logo">
        <x-authentication-card-logo />
    </div>
    <x-validation-errors class="mb-4" />

    @if (session('status')  == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('Un nuevo enlace de verificacion ha sido enviado a tu correo') }}
        </div>
    @endif
    <h4>Antes de continuar</h4>
    <h6 class="font-weight-light">Confirma tu correo electronico, es un paso importante para que puedas empezar a comprar libros!</h6>
    <form class="pt-3" method="POST" action="{{ route('verification.send') }}">
        @csrf
        <div class="mt-3 d-grid gap-2">
            <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Reenviar correo de confirmacion</button>
        </div>
    </form>
    <div class="mt-3 d-grid gap-2">
        <a href="{{ route('profile.show') }}" class="btn btn-block btn-gradient-success btn-lg font-weight-medium auth-form-btn">Editar perfil</a>
    </div>
    <form class="mt-3 d-grid gap-2" method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button class="btn btn-block btn-gradient-danger btn-lg font-weight-medium auth-form-btn" type="submit" href="{{ route('profile.show') }}" class="text-primary">Cerrar sesion</button>
    </form>
</div>
</x-formulario-cuenta>