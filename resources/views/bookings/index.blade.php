<x-app-layout>
    <x-slot name="title">Mis reservas</x-slot>

    <section class="reservas">
        <h1 class="reservas__titulo">Mis reservas</h1>

        @if (session('success'))
            <p class="aviso aviso--exito" role="status">{{ session('success') }}</p>
        @endif
        @if (session('error'))
            <p class="aviso aviso--error" role="alert">{{ session('error') }}</p>
        @endif

        <div class="reservas__lista">
            @forelse ($bookings as $reserva)
                <x-reserva-item :reserva="$reserva" />
            @empty
                <p class="reservas__vacio">
                    Todavía no tienes reservas.
                    <a href="{{ route('alquiler') }}">Reserva tu primera bici</a>.
                </p>
            @endforelse
        </div>
    </section>
</x-app-layout>
