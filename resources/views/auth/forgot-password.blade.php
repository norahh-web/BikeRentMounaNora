<x-guest-layout titulo="Recuperar contraseña" subtitulo="Te enviaremos un enlace para crear una contraseña nueva.">
    <x-auth-session-status class="formulario__estado" :status="session('status')" />

    <form class="formulario" method="POST" action="{{ route('password.email') }}">
        @csrf

        <x-campo nombre="email" tipo="email" etiqueta="Correo electrónico"
                 :valor="old('email')" placeholder="tucorreo@ejemplo.com"
                 required autofocus autocomplete="username" />

        <div class="formulario__acciones">
            <x-boton variante="primario" type="submit" class="formulario__boton">Enviar enlace</x-boton>
        </div>
    </form>

    <x-slot:pie>
        <a class="formulario__enlace" href="{{ route('login') }}">Volver a iniciar sesión</a>
    </x-slot:pie>
</x-guest-layout>