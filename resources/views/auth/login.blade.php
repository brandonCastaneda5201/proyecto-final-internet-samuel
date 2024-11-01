<x-formulario-cuenta titulo="Iniciar sesion">
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
    <h4>Bienvenido! Inicia tu sesion</h4>
    <h6 class="font-weight-light">Para comenzar a comprar libros increibles.</h6>
    <form class="pt-3" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <input type="email" class="form-control form-control-lg"  id="email" name="email" value="{{ old('email') }}"required autofocus autocomplete="email" placeholder="Correo electronico">
        </div>
        <div class="form-group">
            <input id="password" type="password" name="password" required autocomplete="current-password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Contraseña">
        </div>
        <div class="mt-3 d-grid gap-2">
            <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Iniciar sesion</button>
        </div>
        <div class="my-2 d-flex justify-content-between align-items-center">
            <div class="form-check">
                <label class="form-check-label text-muted">
                <input id="remember_me" name="remember" type="checkbox" class="form-check-input"> Mantener Mi sesion iniciada </label>
            </div>
            <a href="{{ route('password.request') }}" class="auth-link text-primary">Olvidaste la contraseña?</a>
        </div>
        <div class="text-center mt-4 font-weight-light"> No tienes cuenta? <a href="{{ route('register') }}" class="text-primary">Crear</a></div>
    </form>
</div>
</x-formulario-cuenta>