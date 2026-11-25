@props(['bici', 'seleccionada' => false, 'elegir' => false])

<x-card
    :class="'bicicleta-card' . ($seleccionada ? ' bicicleta-card--seleccionada' : '')"
    :data-id="$bici->id"
    :data-tipo="$bici->tipo"
    :data-precio="$bici->price_per_hour"
>
    <img
        class="bicicleta-card__foto"
        src="{{ asset($bici->imagen ?? 'images/bicis/urbana.svg') }}"
        alt="Foto de {{ $bici->model }}"
    >

    <div class="bicicleta-card__cuerpo">
        <div class="bicicleta-card__cabecera">
            <span class="bicicleta-card__etiqueta">{{ $bici->tipo }}</span>
            <span class="bicicleta-card__precio">{{ $bici->price_per_hour + 0 }} €/h</span>
        </div>

        <h3 class="bicicleta-card__nombre">{{ $bici->model }}</h3>
        <p class="bicicleta-card__descripcion">{{ $bici->descripcion }}</p>

        @if ($elegir)
            <x-boton class="bicicleta-card__elegir">Elegir</x-boton>
        @else
            <x-boton :href="route('bikes.show', $bici)">Ver detalle</x-boton>
        @endif
    </div>
</x-card>
