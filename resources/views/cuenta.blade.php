<x-app-layout>
    <x-slot name="title">Mi cuenta</x-slot>

    <x-cabecera-pagina
        titulo="Mi cuenta"
        :subtitulo="auth()->check() ? 'Gestiona tu perfil y tus reservas.' : 'Accede a tu espacio personal.'"
    />

    <section class="cuenta">
        @guest
            <x-card class="login-card">
                @include('auth.partials.login-card')
            </x-card>
        @endguest

        @auth
            <x-card class="cuenta__perfil">
                <p class="cuenta__saludo">Hola, {{ Auth::user()->name }}</p>
                <p class="cuenta__correo">{{ Auth::user()->email }}</p>

                <div class="cuenta__acciones">
                    <x-boton :href="route('bookings.index')">Mis reservas</x-boton>
                    <x-boton variante="contorno" :href="route('profile.edit')">Editar perfil</x-boton>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-boton type="submit" variante="texto">Cerrar sesión</x-boton>
                    </form>
                </div>
            </x-card>
        @endauth
    </section>
</x-app-layout>
