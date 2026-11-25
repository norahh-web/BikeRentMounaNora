<x-guest-layout titulo="Nueva contraseña" subtitulo="Elige una contraseña nueva para tu cuenta.">
    <form class="formulario" method="POST" action="{{ route('password.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <x-campo nombre="email" tipo="email" etiqueta="Correo electrónico"
                 :valor="old('email', $request->email)"
                 required autofocus autocomplete="username" />

        <x-campo nombre="password" tipo="password" etiqueta="Contraseña nueva"
                 required autocomplete="new-password" />

        <x-campo nombre="password_confirmation" tipo="password" etiqueta="Confirmar contraseña"
                 required autocomplete="new-password" />

        <div class="formulario__acciones">
            <x-boton variante="primario" type="submit" class="formulario__boton">Guardar contraseña</x-boton>
        </div>
    </form>
</x-guest-layout>