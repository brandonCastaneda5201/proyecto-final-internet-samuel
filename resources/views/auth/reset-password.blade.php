<x-formulario-cuenta titulo="Iniciar sesion">
    <div>
    <div class="brand-logo">
        <x-authentication-card-logo />
    </div>
    <x-validation-errors class="mb-4" />

    <h4>Reestablece tu contraseña</h4>
    <h6 class="font-weight-light">Coloca la nueva contraseña para cambiarla.</h6>
    <form class="pt-3" method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <div class="form-group">
            <input type="email" value="{{old('email', $request->email)}}" class="form-control form-control-lg"  id="email" name="email" value="{{ old('email') }}"required autofocus autocomplete="email" placeholder="Correo electronico">
        </div>
        <div class="form-group">
            <input id="password" type="password" name="password" required autocomplete="new-password" class="form-control form-control-lg" placeholder="Contraseña">
        </div>
        <div class="form-group">
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="confirm-password" class="form-control form-control-lg" placeholder="Confirmar Contraseña">
        </div>
        <div class="mt-3 d-grid gap-2">
            <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Cambiar contraseña</button>
        </div>
    </form>
</div>
</x-formulario-cuenta>