<section class="perfil__bloque" aria-labelledby="titulo-info">
    <h2 class="perfil__titulo" id="titulo-info">Información del perfil</h2>
    <p class="perfil__descripcion">Actualiza tu nombre y tu correo electrónico.</p>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form class="formulario" method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <x-campo nombre="name" tipo="text" etiqueta="Nombre"
                 :valor="old('name', $user->name)" required autofocus autocomplete="name" />

        <x-campo nombre="email" tipo="email" etiqueta="Correo electrónico"
                 :valor="old('email', $user->email)" required autocomplete="username" />

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <p class="perfil__aviso">
                Tu correo electrónico no está verificado.
                <button type="submit" form="send-verification" class="perfil__enlace">
                    Reenviar el correo de verificación
                </button>
            </p>

            @if (session('status') === 'verification-link-sent')
                <p class="perfil__estado" role="status">Te hemos enviado un nuevo enlace de verificación.</p>
            @endif
        @endif

        <div class="formulario__acciones">
            <x-boton type="submit">Guardar</x-boton>

            @if (session('status') === 'profile-updated')
                <p class="perfil__estado" role="status">Cambios guardados.</p>
            @endif
        </div>
    </form>
</section>
