@props(['variante' => 'gris'])

<span {{ $attributes->merge(['class' => 'insignia insignia--' . $variante]) }}>
    {{ $slot }}
</span>
