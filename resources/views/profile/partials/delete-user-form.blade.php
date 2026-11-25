<section class="perfil__bloque" aria-labelledby="titulo-borrar">
    <h2 class="perfil__titulo" id="titulo-borrar">Eliminar cuenta</h2>
    <p class="perfil__descripcion">
        Al eliminar tu cuenta se borrarán de forma permanente todos tus datos y reservas.
        Antes de continuar, guarda la información que quieras conservar.
    </p>

    <details class="perfil__confirmacion" @if ($errors->userDeletion->isNotEmpty()) open @endif>
        <summary class="boton boton--contorno">Eliminar cuenta</summary>

        <form class="formulario" method="post" action="{{ route('profile.destroy') }}">
            @csrf
            @method('delete')

            <h3 class="perfil__subtitulo">¿Seguro que quieres eliminar tu cuenta?</h3>
            <p class="perfil__descripcion">
                Introduce tu contraseña para confirmar que quieres eliminarla de forma permanente.
            </p>

            @if ($errors->userDeletion->any())
                <ul class="formulario__errores" role="alert">
                    @foreach ($errors->userDeletion->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <x-campo nombre="password" id="delete_password" tipo="password"
                     etiqueta="Contraseña" placeholder="Tu contraseña" autocomplete="current-password" required />

            <div class="formulario__acciones">
                <x-boton type="submit">Eliminar cuenta definitivamente</x-boton>
            </div>
        </form>
    </details>
</section>
