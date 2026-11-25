<x-app-layout>
    <x-slot name="title">Mi perfil</x-slot>

    <x-cabecera-pagina titulo="Mi perfil" subtitulo="Gestiona tu información personal y tu cuenta." />

    <div class="perfil">
        <x-card class="perfil__seccion">
            @include('profile.partials.update-profile-information-form')
        </x-card>

        <x-card class="perfil__seccion">
            @include('profile.partials.update-password-form')
        </x-card>

        <x-card class="perfil__seccion">
            @include('profile.partials.delete-user-form')
        </x-card>
    </div>
</x-app-layout>
