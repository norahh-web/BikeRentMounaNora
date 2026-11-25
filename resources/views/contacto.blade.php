<x-app-layout>
    <x-slot:title>Contacto</x-slot:title>

    <x-cabecera-pagina titulo="Contacto" subtitulo="¿Tienes alguna pregunta? Escríbenos y te responderemos lo antes posible." />

    <div class="contacto contenedor">
        <x-card class="contacto__formulario">
            <h2 class="visualmente-oculto">Formulario de contacto</h2>

            @if (session('status'))
                <p class="formulario__estado" role="status">{{ session('status') }}</p>
            @endif

            <form class="formulario" method="POST" action="{{ route('contacto.enviar') }}">
                @csrf

                <x-campo nombre="nombre" etiqueta="Nombre" :valor="old('nombre')"
                         placeholder="Tu nombre" required autocomplete="name" />

                <x-campo nombre="email" tipo="email" etiqueta="Correo electrónico" :valor="old('email')"
                         placeholder="tucorreo@ejemplo.com" required autocomplete="email" />

                <x-campo nombre="asunto" etiqueta="Asunto" :valor="old('asunto')"
                         placeholder="¿En qué podemos ayudarte?" required maxlength="150" />

                <x-campo nombre="mensaje" tipo="textarea" etiqueta="Mensaje" :valor="old('mensaje')"
                         placeholder="Escribe tu mensaje…" required maxlength="1000" />

                <div class="formulario__acciones">
                    <x-boton variante="primario" type="submit" class="formulario__boton">Enviar mensaje</x-boton>
                </div>
            </form>
        </x-card>

        <div class="contacto__lateral">
            <x-card class="contacto__datos">
                <h2 class="contacto__titulo">Visítanos</h2>

                <dl class="contacto__lista">
                    <div class="contacto__item">
                        <dt class="contacto__etiqueta">Dirección</dt>
                        <dd>Calle de la Bici 12</dd>
                    </div>
                    <div class="contacto__item">
                        <dt class="contacto__etiqueta">Teléfono</dt>
                        <dd><a class="contacto__enlace" href="tel:+34600000000">+34 600 000 000</a></dd>
                    </div>
                    <div class="contacto__item">
                        <dt class="contacto__etiqueta">Correo</dt>
                        <dd><a class="contacto__enlace" href="mailto:hola@onyarbizi.com">hola@onyarbizi.com</a></dd>
                    </div>
                    <div class="contacto__item">
                        <dt class="contacto__etiqueta">Horario</dt>
                        <dd>Lun – Dom · 9:00 – 20:00</dd>
                    </div>
                </dl>
            </x-card>

            {{-- Sustituir por un mapa real (iframe con atributo title) cuando se elija el proveedor --}}
            <div class="contacto__mapa" role="img" aria-label="Mapa con la ubicación de OnyarBizi (próximamente)">
                <span aria-hidden="true">Mapa</span>
            </div>
        </div>
    </div>
</x-app-layout>