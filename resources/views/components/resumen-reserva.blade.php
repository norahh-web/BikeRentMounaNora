<x-card class="resumen">
    <h2 class="resumen__titulo">Resumen de tu reserva</h2>

    <form method="POST" action="{{ route('bookings.store') }}" id="formulario-reserva">
        @csrf
        <input type="hidden" name="bike_id" id="campo-bici">
        <input type="hidden" name="start_time" id="campo-inicio">
        <input type="hidden" name="end_time" id="campo-fin">

        <dl class="resumen__lista">
            <div class="resumen__fila"><dt>Bici</dt><dd id="resumen-bici">—</dd></div>
            <div class="resumen__fila"><dt>Fecha</dt><dd id="resumen-fecha">—</dd></div>
            <div class="resumen__fila"><dt>Horario</dt><dd id="resumen-horario">—</dd></div>
            <div class="resumen__fila"><dt>Duración</dt><dd id="resumen-duracion">—</dd></div>
            <div class="resumen__fila"><dt>Precio por hora</dt><dd id="resumen-precio">—</dd></div>
        </dl>

        <p class="resumen__total">
            <span>Total</span>
            <strong id="resumen-total">0 €</strong>
        </p>

        <x-boton type="submit" id="boton-confirmar" variante="deshabilitado">Confirmar reserva</x-boton>
    </form>

    <p class="resumen__nota">Cancelación gratuita hasta 24 h antes.</p>
</x-card>
