@props(['activo' => false])

<button {{ $attributes->merge(['class' => 'chip' . ($activo ? ' chip--activo' : ''), 'type' => 'button']) }} aria-pressed="{{ $activo ? 'true' : 'false' }}">
    {{ $slot }}
</button>
