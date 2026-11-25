<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layouts.partials.head', ['title' => $titulo])
    </head>
    <body>
        <a class="skip-link" href="#contenido">Saltar al contenido</a>

        <div class="app">
            @include('layouts.navigation')

            <main id="contenido" class="app__main">
                <x-cabecera-pagina :titulo="$titulo" :subtitulo="$subtitulo" />

                <div class="guest">
                    <x-card class="guest__card">
                        {{ $slot }}
                    </x-card>

                    @isset($pie)
                        <div class="guest__pie">{{ $pie }}</div>
                    @endisset
                </div>
            </main>

            @include('layouts.footer')
            @include('layouts.bottom-nav')
        </div>
    </body>
</html>