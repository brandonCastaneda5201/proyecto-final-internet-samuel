<x-formulario-cuenta titulo="Recuperar cuenta">
    <div>
    <div class="brand-logo">
        <x-authentication-card-logo />
    </div>
    <x-validation-errors class="mb-4" />

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ session('status') }}
        </div>
    @endif
    <h4>Has olvidado tu contraseña?</h4>
    <h6 class="font-weight-light">No te preocupes! coloca tu correo electronico para recibir pasos de como reestablecerla.</h6>
    <form class="pt-3" method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form-group">
            <input type="email" class="form-control form-control-lg"  id="email" name="email" value="{{ old('email') }}"required autofocus autocomplete="email" placeholder="Correo electronico">
        </div>
        <div class="mt-3 d-grid gap-2">
            <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Reestablecer contraseña</button>
        </div>
        <div class="text-center mt-4 font-weight-light"> No tienes cuenta? <a href="{{ route('register') }}" class="text-primary">Crear</a></div>
    </form>
</div>
</x-formulario-cuenta>