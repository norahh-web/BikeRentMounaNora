<?php

// Enlaces de navegación: los usan la navbar, la barra inferior y el footer.
// 'activa' = nombres de rutas en las que el enlace se marca como actual.
return [
    'enlaces' => [
        ['ruta' => 'bikes.index', 'texto' => 'Inicio', 'corto' => 'Inicio', 'icono' => 'inicio', 'activa' => ['bikes.index']],
        ['ruta' => 'alquiler', 'texto' => 'Alquiler', 'corto' => 'Alquiler', 'icono' => 'bici', 'activa' => ['alquiler', 'bikes.show']],
        ['ruta' => 'nosotros', 'texto' => 'Quiénes somos', 'corto' => 'Nosotros', 'icono' => 'equipo', 'activa' => ['nosotros']],
        ['ruta' => 'contacto', 'texto' => 'Contacto', 'corto' => 'Contacto', 'icono' => 'correo', 'activa' => ['contacto']],
        ['ruta' => 'cuenta', 'texto' => 'Cuenta', 'corto' => 'Cuenta', 'icono' => 'cuenta', 'activa' => ['cuenta', 'profile.*', 'bookings.*', 'login', 'register']],
    ],
];
