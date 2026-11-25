<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

/**
 * Layout de las páginas de autenticación (login, registro, contraseña...).
 * Comparte navbar, footer y barra inferior con el layout app, y añade
 * una cabecera de página y una tarjeta centrada para el formulario.
 */
class GuestLayout extends Component
{
    public function __construct(
        public string $titulo = 'Mi cuenta',
        public ?string $subtitulo = null,
    ) {}

    public function render(): View
    {
        return view('layouts.guest');
    }
}