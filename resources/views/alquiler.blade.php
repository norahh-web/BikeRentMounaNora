<x-app-layout>
    <x-slot name="title">Alquiler</x-slot>

    <section class="alquiler__cabecera">
        <h1 class="alquiler__titulo">Alquila tu bici</h1>
        <p class="alquiler__subtitulo">Elige una bici, selecciona la fecha y las horas, y confirma tu reserva.</p>

        <div class="alquiler__filtros" role="group" aria-label="Filtrar por tipo de bici">
            <x-chip :activo="true" data-filtro="todas">Todas</x-chip>
            @foreach (['Urbana', 'Eléctrica', 'Montaña', 'Infantil'] as $tipo)
                <x-chip :data-filtro="$tipo">{{ $tipo }}</x-chip>
            @endforeach
        </div>

        <label class="alquiler__orden">
            <span class="alquiler__orden-texto">Ordenar por</span>
            <select class="alquiler__selector" id="orden-precio">
                <option value="">Orden original</option>
                <option value="asc">Precio por hora: de menor a mayor</option>
                <option value="desc">Precio por hora: de mayor a menor</option>
            </select>
        </label>
    </section>

    <div class="alquiler__cuerpo" id="alquiler" data-bici-inicial="{{ $biciElegida }}">
        <div class="alquiler__pasos">
            <section aria-labelledby="paso-bici">
                <h2 class="alquiler__paso" id="paso-bici">1. Elige tu bici</h2>
                <div class="alquiler__bicis" id="lista-bicis">
                    @foreach ($bicis as $bici)
                        <x-bicicleta-card
                            :bici="$bici"
                            :elegir="true"
                            :seleccionada="(string) $bici->id === (string) $biciElegida"
                        />
                    @endforeach
                </div>
                <p class="alquiler__vacio" id="aviso-sin-bicis" hidden>No hay bicis de este tipo.</p>
            </section>

            <section aria-labelledby="paso-fecha">
                <h2 class="alquiler__paso" id="paso-fecha">2. Elige la fecha</h2>
                <x-calendario />
            </section>

            <section aria-labelledby="paso-horas">
                <h2 class="alquiler__paso" id="paso-horas">3. Elige las horas</h2>
                <div class="alquiler__franjas" id="lista-franjas">
                    @foreach (range(9, 20) as $hora)
                        <x-franja-horaria :hora="sprintf('%02d:00', $hora)" />
                    @endforeach
                </div>
                <p class="alquiler__estado" id="texto-horas" aria-live="polite">Aún no has elegido horas.</p>
            </section>
        </div>

        <aside class="alquiler__resumen" aria-label="Resumen de la reserva">
            <x-resumen-reserva />
        </aside>
    </div>
</x-app-layout>
