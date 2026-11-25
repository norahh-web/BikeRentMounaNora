<x-app-layout>
    <x-slot name="title">Inicio</x-slot>

    <section class="hero">
        <div class="hero__texto">
            <p class="hero__etiqueta">ALQUILER DE BICIS POR HORAS</p>
            <h1 class="hero__titulo">Muévete a tu ritmo, pedalea a tu manera</h1>
            <p class="hero__descripcion">
                Bicis urbanas, eléctricas, de montaña e infantiles. Elige la tuya, reserva el día y las horas, y sal a rodar.
            </p>
            <div class="hero__acciones">
                <x-boton variante="lima" :href="route('alquiler')">Reservar ahora</x-boton>
                <x-boton variante="contorno" href="#bicis">Ver bicis</x-boton>
            </div>
        </div>
        <div class="hero__imagen" aria-hidden="true"></div>
    </section>

    <section class="bicis" id="bicis" aria-labelledby="titulo-bicis">
        <h2 class="bicis__titulo" id="titulo-bicis">Nuestras bicis</h2>
        <p class="bicis__subtitulo">Cuatro tipos de bici, con precio por hora según el modelo.</p>

        <div class="bicis__lista">
            @foreach ($bicis as $bici)
                <x-bicicleta-card :bici="$bici" />
            @endforeach
        </div>
    </section>

    <section class="pasos" aria-labelledby="titulo-pasos">
        <h2 class="pasos__titulo" id="titulo-pasos">Cómo funciona</h2>

        <ol class="pasos__lista">
            @foreach ([
                ['Elige tu bici', 'Urbana, eléctrica, de montaña o infantil.'],
                ['Selecciona fecha y horas', 'Reserva solo el tiempo que necesitas.'],
                ['Recoge y pedalea', 'Tu bici te espera lista para salir.'],
            ] as [$titulo, $texto])
                <li class="pasos__item">
                    <x-card class="pasos__tarjeta">
                        <h3 class="pasos__nombre">{{ $titulo }}</h3>
                        <p class="pasos__texto">{{ $texto }}</p>
                    </x-card>
                </li>
            @endforeach
        </ol>
    </section>

    <section class="cta" aria-labelledby="titulo-cta">
        <h2 class="cta__titulo" id="titulo-cta">¿Listo para salir a rodar?</h2>
        <p class="cta__texto">Reserva tu bici en menos de un minuto.</p>
        <x-boton variante="lima" :href="route('alquiler')">Reservar ahora</x-boton>
    </section>
</x-app-layout>
