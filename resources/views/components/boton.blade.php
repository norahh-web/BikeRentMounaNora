@props(['variante' => 'primario', 'href' => null])

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => 'boton boton--' . $variante]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => 'boton boton--' . $variante, 'type' => 'button']) }} @disabled($variante === 'deshabilitado')>
        {{ $slot }}
    </button>
@endif
