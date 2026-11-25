<footer class="footer">
    <div class="footer__contenedor">
        <a class="footer__logo" href="{{ route('bikes.index') }}" aria-label="OnyarBizi, ir al inicio">
            <x-logo class="footer__logo-imagen" />
        </a>

        <p class="footer__descripcion">Alquiler de bicis por horas. Urbanas, eléctricas, de montaña e infantiles.</p>

        <nav aria-label="Pie de página">
            <ul class="footer__lista">
                @foreach (config('navegacion.enlaces') as $enlace)
                    <li><a class="footer__enlace" href="{{ route($enlace['ruta']) }}">{{ $enlace['texto'] }}</a></li>
                @endforeach
            </ul>
        </nav>

        <div class="footer__linea"></div>
        <p class="footer__copy">© {{ date('Y') }} OnyarBizi. Todos los derechos reservados.</p>
    </div>
</footer>
