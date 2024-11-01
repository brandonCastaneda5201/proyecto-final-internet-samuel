<x-formulario-cuenta titulo="Crear cuenta">
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
    <h4>Bienvenido! Crea tu cuenta</h4>
    <h6 class="font-weight-light">Para comprar los mejores libros.</h6>
    <form class="pt-3" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <input type="name" class="form-control form-control-lg"  id="name" name="name" value="{{ old('name') }}"required autofocus autocomplete="name" placeholder="Nombres">
        </div>
        <div class="form-group">
            <input type="text" class="form-control form-control-lg"  id="apellido" name="apellido" value="{{ old('apellido') }}"required autofocus autocomplete="apellido" placeholder="Apellidos">
        </div>
        <div class="form-group">
            <input type="text" class="form-control form-control-lg"  id="direccion" name="direccion" value="{{ old('direccion') }}"required autofocus autocomplete="Direccion" placeholder="Domicilio">
        </div>
        <div class="form-group">
            <input type="email" class="form-control form-control-lg"  id="email" name="email" value="{{ old('email') }}"required autofocus autocomplete="email" placeholder="Correo electronico">
        </div>
        <div class="form-group">
            <input type="tel" class="form-control form-control-lg"  id="telefono" name="telefono" value="{{ old('telefono') }}"required autofocus autocomplete="phone" placeholder="Telefono">
        </div>
        <div class="form-group">
            <input id="password" type="password" name="password" required autocomplete="new-password" class="form-control form-control-lg" placeholder="Contraseña">
        </div>
        <div class="form-group">
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="confirm-password" class="form-control form-control-lg" placeholder="Confirmar Contraseña">
        </div>
        <div class="mt-3 d-grid gap-2">
            <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Crear Cuenta</button>
        </div>
        <div class="text-center mt-4 font-weight-light"> Ya tienes cuenta? <a href="{{ route('login') }}" class="text-primary">Iniciar sesion</a></div>
    </form>
</div>
</x-formulario-cuenta>