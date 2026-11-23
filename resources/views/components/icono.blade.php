@props(['nombre'])

<svg {{ $attributes->merge(['class' => 'icono']) }} viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
    @switch($nombre)
        @case('inicio')
            <path d="M3 11l9-8 9 8v10a1 1 0 0 1-1 1h-5v-7H9v7H4a1 1 0 0 1-1-1z" />
            @break
        @case('bici')
            <circle cx="6" cy="17" r="3.5" />
            <circle cx="18" cy="17" r="3.5" />
            <path d="M6 17l4-8h5l3 8M10 9L8 6H6" />
            @break
        @case('equipo')
            <circle cx="9" cy="8" r="3" />
            <path d="M3 20c0-3.3 2.7-6 6-6s6 2.7 6 6" />
            <circle cx="17" cy="9" r="2.5" />
            <path d="M17 14c2.5 0 4.5 2 4.5 5" />
            @break
        @case('correo')
            <rect x="3" y="5" width="18" height="14" rx="2" />
            <path d="M3 7l9 6 9-6" />
            @break
        @case('cuenta')
            <circle cx="12" cy="12" r="9" />
            <circle cx="12" cy="10" r="3" />
            <path d="M6.5 18.5c1.2-2.2 3.2-3.5 5.5-3.5s4.3 1.3 5.5 3.5" />
            @break
    @endswitch
</svg>
