<x-guest-layout titulo="Registrar" subtitulo="Crea tu cuenta y reserva tu bici en un par de minutos.">
    <form class="formulario" method="POST" action="{{ route('register') }}">
        @csrf

        <x-campo nombre="name" etiqueta="Nombre"
                 :valor="old('name')" placeholder="Tu nombre"
                 required autofocus autocomplete="name" />

        <x-campo nombre="email" tipo="email" etiqueta="Correo electrónico"
                 :valor="old('email')" placeholder="tucorreo@ejemplo.com"
                 required autocomplete="username" />

        <x-campo nombre="password" tipo="password" etiqueta="Contraseña"
                 placeholder="Escribe tu contraseña…"
                 required autocomplete="new-password" />

        <x-campo nombre="password_confirmation" tipo="password" etiqueta="Confirmar contraseña"
                 placeholder="Confirma tu contraseña…"
                 required autocomplete="new-password" />

        <div class="formulario__acciones">
            <x-boton variante="primario" type="submit" class="formulario__boton">Crear cuenta</x-boton>
        </div>
    </form>

    <x-slot:pie>
        ¿Ya tienes cuenta? <a class="formulario__enlace" href="{{ route('login') }}">Inicia sesión</a>
    </x-slot:pie>
</x-guest-layout>