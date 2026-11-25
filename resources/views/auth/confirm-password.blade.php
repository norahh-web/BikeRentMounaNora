<x-guest-layout titulo="Confirmar contraseña" subtitulo="Es una zona protegida. Confirma tu contraseña para continuar.">
    <form class="formulario" method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <x-campo nombre="password" tipo="password" etiqueta="Contraseña"
                 required autofocus autocomplete="current-password" />

        <div class="formulario__acciones">
            <x-boton variante="primario" type="submit" class="formulario__boton">Confirmar</x-boton>
        </div>
    </form>
</x-guest-layout>