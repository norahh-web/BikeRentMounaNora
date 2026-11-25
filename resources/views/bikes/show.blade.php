@php
    $estados = [
        'available' => 'Disponible',
        'maintenance' => 'En mantenimiento',
        'retired' => 'Fuera de servicio',
    ];
@endphp

<x-app-layout>
    <x-slot name="title">{{ $bike->model }}</x-slot>

    <article class="detalle">
        <a class="detalle__volver" href="{{ route('bikes.index') }}">‹ Volver al inicio</a>

        <img
            class="detalle__foto"
            src="{{ asset($bike->imagen ?? 'images/bicis/urbana.svg') }}"
            alt="Foto de {{ $bike->model }}"
        >

        <div class="detalle__info">
            <x-insignia variante="gris">{{ $bike->tipo }}</x-insignia>
            <h1 class="detalle__titulo">{{ $bike->model }}</h1>
            <p class="detalle__descripcion">{{ $bike->descripcion }}</p>

            <dl class="detalle__datos">
                <div class="detalle__fila"><dt>Precio por hora</dt><dd>{{ $bike->price_per_hour + 0 }} €/h</dd></div>
                <div class="detalle__fila"><dt>Horario</dt><dd>09:00 – 20:00, todos los días</dd></div>
                <div class="detalle__fila"><dt>Estado</dt><dd>{{ $estados[$bike->status] ?? $bike->status }}</dd></div>
            </dl>

            @if ($bike->status === 'available')
                <x-boton :href="route('alquiler', ['bici' => $bike->id])">Reservar</x-boton>
            @else
                <x-boton variante="deshabilitado">No disponible</x-boton>
            @endif
        </div>
    </article>
</x-app-layout>
