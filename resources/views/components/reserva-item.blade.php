@props(['reserva'])

@php
    $estados = [
        'pending' => ['pendiente', 'Pendiente'],
        'active' => ['confirmada', 'Confirmada'],
        'cancelled' => ['gris', 'Cancelada'],
    ];
    [$variante, $texto] = $estados[$reserva->status] ?? ['gris', ucfirst($reserva->status)];

    $inicio = \Carbon\Carbon::parse($reserva->start_time)->locale('es');
    $fin = \Carbon\Carbon::parse($reserva->end_time);
    $fecha = ucfirst(str_replace('.', '', $inicio->translatedFormat('D j M')));
    $horario = $inicio->format('H:i') . ' - ' . $fin->format('H:i');
@endphp

<x-card {{ $attributes->merge(['class' => 'reserva-item']) }}>
    <div class="reserva-item__info">
        <h3 class="reserva-item__nombre">{{ $reserva->bike->model }}</h3>
        <p class="reserva-item__fecha">{{ $fecha }} · {{ $horario }}</p>
    </div>

    <div class="reserva-item__lado">
        <x-insignia :variante="$variante">{{ $texto }}</x-insignia>
        <p class="reserva-item__total">{{ $reserva->total_cost + 0 }} €</p>
    </div>
</x-card>
