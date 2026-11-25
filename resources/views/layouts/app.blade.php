<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layouts.partials.head')
    </head>
    <body>
        <a class="skip-link" href="#contenido">Saltar al contenido</a>

        <div class="app">
            @include('layouts.navigation')

            @isset($header)
                <header class="app__header">
                    <div class="app__header-content">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main id="contenido" class="app__main">
                {{ $slot }}
            </main>

            @include('layouts.footer')
            @include('layouts.bottom-nav')
        </div>
    </body>
</html>