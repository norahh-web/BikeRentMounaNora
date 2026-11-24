@props(['anio' => 2026, 'mes' => 11])

@php
    $primerDia = \Carbon\Carbon::create($anio, $mes, 1);
    $diasMes = $primerDia->daysInMonth;
    $huecos = $primerDia->dayOfWeekIso - 1;
    $hoy = now()->startOfDay();
    $titulo = ucfirst($primerDia->copy()->locale('es')->translatedFormat('F Y'));
@endphp

<div {{ $attributes->merge(['class' => 'calendario']) }} data-anio="{{ $anio }}" data-mes="{{ $mes }}">
    <div class="calendario__cabecera">
        <button type="button" class="calendario__nav" aria-label="Mes anterior">‹</button>
        <h3 class="calendario__titulo">{{ $titulo }}</h3>
        <button type="button" class="calendario__nav" aria-label="Mes siguiente">›</button>
    </div>

    <div class="calendario__semana" aria-hidden="true">
        @foreach (['L', 'M', 'X', 'J', 'V', 'S', 'D'] as $letra)
            <span>{{ $letra }}</span>
        @endforeach
    </div>

    <div class="calendario__dias">
        @for ($i = 0; $i < $huecos; $i++)
            <span class="calendario__hueco"></span>
        @endfor

        @for ($dia = 1; $dia <= $diasMes; $dia++)
            @php $fecha = $primerDia->copy()->day($dia); @endphp
            <button
                type="button"
                class="calendario__dia{{ $fecha->isSameDay($hoy) ? ' calendario__dia--hoy' : '' }}"
                data-fecha="{{ $fecha->toDateString() }}"
                @disabled($fecha->lt($hoy))
            >{{ $dia }}</button>
        @endfor
    </div>
</div>
