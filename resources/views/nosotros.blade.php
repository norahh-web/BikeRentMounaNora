@php
    $valores = [
        ['color' => 'violeta', 'titulo' => 'Sostenible', 'texto' => 'Menos coches y más aire limpio. Cada trayecto en bici cuenta.'],
        ['color' => 'azul', 'titulo' => 'Para todos', 'texto' => 'Bicis para cada edad y cada camino, con precios por hora claros.'],
        ['color' => 'verde', 'titulo' => 'Cercanos', 'texto' => 'Te atendemos en persona y te ayudamos a elegir la bici ideal.'],
    ];

    $cifras = [
        ['numero' => '4', 'texto' => 'tipos de bici'],
        ['numero' => '+120', 'texto' => 'bicis en la flota'],
        ['numero' => '7/7', 'texto' => 'días disponibles'],
    ];
@endphp

<x-app-layout>
    <x-slot:title>Quiénes somos</x-slot:title>

    <x-cabecera-pagina variante="oscura" antetitulo="Quiénes somos" titulo="Una forma más sencilla de moverse">
        OnyarBizi nació con una idea simple: que cualquiera pueda subirse a una bici cuando la necesite.
        Bicis urbanas, eléctricas, de montaña e infantiles, siempre revisadas y listas para rodar.
    </x-cabecera-pagina>

    <div class="nosotros contenedor">
        {{-- Sustituir por <img> con alt descriptivo cuando haya foto real del equipo --}}
        <div class="nosotros__foto" role="img" aria-label="Foto del equipo de OnyarBizi (próximamente)">
            <span class="nosotros__foto-texto" aria-hidden="true">Foto del equipo</span>
        </div>

        <section class="nosotros__valores" aria-labelledby="valores-titulo">
            <h2 id="valores-titulo" class="nosotros__subtitulo">Lo que nos mueve</h2>

            <ul class="nosotros__lista" role="list">
                @foreach ($valores as $valor)
                    <li>
                        <x-card class="valor valor--{{ $valor['color'] }}">
                            <h3 class="valor__titulo">{{ $valor['titulo'] }}</h3>
                            <p class="valor__texto">{{ $valor['texto'] }}</p>
                        </x-card>
                    </li>
                @endforeach
            </ul>
        </section>
    </div>

    <section class="cifras" aria-label="OnyarBizi en cifras">
        <dl class="cifras__lista contenedor">
            @foreach ($cifras as $cifra)
                <div class="cifras__item">
                    <dt class="cifras__texto">{{ $cifra['texto'] }}</dt>
                    <dd class="cifras__numero">{{ $cifra['numero'] }}</dd>
                </div>
            @endforeach
        </dl>
    </section>
</x-app-layout>