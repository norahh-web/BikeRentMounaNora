<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layouts.partials.head')
    </head>
    <body>
        <a class="skip-link" href="#contenido">Saltar al contenido</a>

        <div class="guest">
            <div class="guest__logo">
                <a href="/">
                    <x-application-logo class="guest__logo-icon" />
                </a>
            </div>

            <main id="contenido" class="guest__card">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>