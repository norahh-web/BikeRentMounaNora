<x-guest-layout titulo="Verifica tu correo" subtitulo="Te hemos enviado un enlace de verificación al registrarte.">
    <p class="formulario__texto">
        Antes de empezar, abre el enlace que te hemos enviado por correo. Si no lo encuentras, te enviamos otro.
    </p>

    @if (session('status') == 'verification-link-sent')
        <p class="formulario__estado" role="status">
            Te hemos enviado un enlace nuevo al correo que usaste al registrarte.
        </p>
    @endif

    <div class="formulario__acciones">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-boton variante="primario" type="submit" class="formulario__boton">Reenviar correo de verificación</x-boton>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-boton variante="texto" type="submit" class="formulario__boton">Cerrar sesión</x-boton>
        </form>
    </div>
</x-guest-layout>