# OnyarBizi · BikeRent
OnyarBizi es una web para alquilar bicis por horas: urbanas, eléctricas, de montaña e infantiles. Eliges la bici, el día y las horas, ves el precio al instante y reservas en menos de un minuto. Con modo claro y oscuro, para que se vea bien a cualquier hora.

## Qué puedes hacer

- **Filtrar** las bicis por tipo y **ordenarlas por precio**.
- **Reservar** eligiendo bici, día y horas, con el total calculado al momento.
- **Recibir avisos** si algo falta o está mal, antes de enviar.
- **Cambiar de tema** (luna / sol); la web recuerda tu elección.

## Cómo está organizado el JavaScript

Todo está en `resources/js/`, en módulos ES. Cada archivo hace una sola cosa:

| Módulo | Para qué sirve |
|---|---|
| `app.js` | Punto de entrada: importa los demás. |
| `catalogo.js` | Filtro por tipo y orden por precio (funcionan a la vez). |
| `reserva.js` | Resumen, estimación del total y validación de la reserva. |
| `tema.js` | Tema claro/oscuro guardado en `localStorage`. |

Detalles importantes:
- La validación del navegador (bici, fecha y horas seguidas) **ayuda al usuario**, pero **no sustituye** a Laravel. El cálculo final del precio y los solapamientos los hace el servidor.
- Los módulos no fallan en páginas donde no hacen falta.

## Carga con Vite

`app.js` es el único archivo JS que se carga, con un solo `@vite` en `layouts/partials/head.blade.php`. Para añadir un módulo, solo se importa en `app.js`.

##  Cómo ejecutar el proyecto

```bash
sail up -d
sail composer install
sail artisan migrate
sail artisan db:seed --class=BikeSeeder
sail artisan db:seed --class=BikesExtraSeeder
sail npm install
sail npm run dev      # desarrollo (abre http://localhost)
sail npm run build    # versión final
```

## Cómo probarlo

1. En `/alquiler`, usa los filtros y el orden por precio.
2. Elige una bici, un día y varias horas: mira cómo cambia el resumen.
3. Prueba horas no seguidas o sin elegir día: sale el aviso.
4. Inicia sesión, confirma y mira tu reserva en `/my-bookings` (se puede cancelar).
5. Pulsa la luna/sol y recarga: el tema se mantiene.

Comprobado: sin errores en la consola, y funcionan `npm run dev` y `npm run build`.
