@props(['hora', 'estado' => 'normal'])

<button
    {{ $attributes->merge([
        'class' => 'franja' . ($estado !== 'normal' ? ' franja--' . $estado : ''),
        'type' => 'button',
        'data-hora' => $hora,
    ]) }}
    aria-pressed="{{ $estado === 'elegida' ? 'true' : 'false' }}"
    @disabled($estado === 'deshabilitada')
>
    {{ $hora }}
</button>
