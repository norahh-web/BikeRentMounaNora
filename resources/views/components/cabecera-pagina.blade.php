{{--
    Cabecera de página reutilizable (Registrar, Login, Contacto, Quiénes somos...).
    Uso:
      <x-cabecera-pagina titulo="Registrar" subtitulo="Crea tu cuenta..." />
      <x-cabecera-pagina variante="oscura" antetitulo="Quiénes somos" titulo="Una forma más sencilla de moverse">
          Texto largo en el slot
      </x-cabecera-pagina>
--}}
@props(['titulo', 'subtitulo' => null, 'antetitulo' => null, 'variante' => 'clara'])

<header {{ $attributes->merge(['class' => 'cabecera-pagina cabecera-pagina--' . $variante]) }}>
    <div class="cabecera-pagina__contenido contenedor">
        @if ($antetitulo)
            <p class="cabecera-pagina__antetitulo">{{ $antetitulo }}</p>
        @endif

        <h1 class="cabecera-pagina__titulo">{{ $titulo }}</h1>

        @if ($subtitulo)
            <p class="cabecera-pagina__texto">{{ $subtitulo }}</p>
        @endif

        @if ($slot->isNotEmpty())
            <div class="cabecera-pagina__texto">{{ $slot }}</div>
        @endif
    </div>
</header>