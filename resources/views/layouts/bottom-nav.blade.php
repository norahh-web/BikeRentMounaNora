<nav class="barra-inferior" aria-label="Navegación móvil">
    <ul class="barra-inferior__lista">
        @foreach (config('navegacion.enlaces') as $enlace)
            @php $activo = request()->routeIs(...$enlace['activa']); @endphp
            <li class="barra-inferior__item">
                <a
                    href="{{ route($enlace['ruta']) }}"
                    class="barra-inferior__enlace{{ $activo ? ' barra-inferior__enlace--activo' : '' }}"
                    @if ($activo) aria-current="page" @endif
                >
                    <x-icono :nombre="$enlace['icono']" class="barra-inferior__icono" />
                    <span class="barra-inferior__texto">{{ $enlace['corto'] }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</nav>
