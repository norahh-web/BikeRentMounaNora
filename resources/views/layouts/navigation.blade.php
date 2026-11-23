<header class="navbar">
    <nav class="navbar__contenedor" aria-label="Principal">
        <a class="navbar__logo" href="{{ route('bikes.index') }}" aria-label="OnyarBizi, ir al inicio">
            {{-- Logo provisional: se cambiará por <x-logo /> cuando A lo entregue --}}
            <span class="navbar__logo-texto">OnyarBizi</span>
        </a>

        <ul class="navbar__lista">
            @foreach (config('navegacion.enlaces') as $enlace)
                @php $activo = request()->routeIs(...$enlace['activa']); @endphp
                <li>
                    <a
                        href="{{ route($enlace['ruta']) }}"
                        class="navbar__enlace{{ $activo ? ' navbar__enlace--activo' : '' }}"
                        @if ($activo) aria-current="page" @endif
                    >{{ $enlace['texto'] }}</a>
                </li>
            @endforeach
        </ul>

        <x-boton variante="lima" :href="route('alquiler')" class="navbar__reservar">Reservar</x-boton>
    </nav>
</header>
