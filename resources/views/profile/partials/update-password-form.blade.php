<section class="perfil__bloque" aria-labelledby="titulo-clave">
    <h2 class="perfil__titulo" id="titulo-clave">Cambiar contraseña</h2>
    <p class="perfil__descripcion">Usa una contraseña larga y aleatoria para mantener tu cuenta segura.</p>

    <form class="formulario" method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        @if ($errors->updatePassword->any())
            <ul class="formulario__errores" role="alert">
                @foreach ($errors->updatePassword->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <x-campo nombre="current_password" id="update_password_current_password" tipo="password"
                 etiqueta="Contraseña actual" autocomplete="current-password" />

        <x-campo nombre="password" id="update_password_password" tipo="password"
                 etiqueta="Contraseña nueva" autocomplete="new-password" />

        <x-campo nombre="password_confirmation" id="update_password_password_confirmation" tipo="password"
                 etiqueta="Confirmar contraseña" autocomplete="new-password" />

        <div class="formulario__acciones">
            <x-boton type="submit">Guardar</x-boton>

            @if (session('status') === 'password-updated')
                <p class="perfil__estado" role="status">Contraseña actualizada.</p>
            @endif
        </div>
    </form>
</section>
