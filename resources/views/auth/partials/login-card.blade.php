{{--
    Formulario de inicio de sesión reutilizable.
    Lo usan auth/login y la vista cuenta:  @include('auth.partials.login-card')
    No lleva tarjeta propia: quien lo incluye decide el contenedor (en cuenta: <x-card class="login-card">).
--}}
<x-auth-session-status class="formulario__estado" :status="session('status')" />

<form class="formulario" method="POST" action="{{ route('login') }}">
    @csrf

    <x-campo nombre="email" tipo="email" etiqueta="Correo electrónico"
             :valor="old('email')" placeholder="tucorreo@ejemplo.com"
             required autofocus autocomplete="username" />

    <x-campo nombre="password" tipo="password" etiqueta="Contraseña"
             placeholder="Escribe tu contraseña…"
             required autocomplete="current-password" />

    <div class="formulario__fila">
        <label class="formulario__recordar" for="remember_me">
            <input id="remember_me" type="checkbox" class="formulario__casilla" name="remember">
            <span>Recordarme</span>
        </label>

        @if (Route::has('password.request'))
            <a class="formulario__enlace" href="{{ route('password.request') }}">¿Has olvidado tu contraseña?</a>
        @endif
    </div>

    <div class="formulario__acciones">
        <x-boton variante="primario" type="submit" class="formulario__boton">Iniciar sesión</x-boton>

        @if (Route::has('register'))
            <x-boton variante="contorno" :href="route('register')" class="formulario__boton">Crear cuenta</x-boton>
        @endif
    </div>
</form>