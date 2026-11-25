# OnyarBizi · BikeRent · Diseño (DIW)
OnyarBizi es una web para alquilar bicis por horas: urbanas, eléctricas, de montaña e infantiles. Esta parte documenta el diseño y el CSS: el sistema de diseño, los layouts y componentes Blade, la retirada de Tailwind y la accesibilidad. El JavaScript está explicado en [README-DWC.md](README-DWC.md).
 
- **Figma:** https://www.figma.com/design/cgYYWJ4AYajUuC5H7VIozm/OnyarBizi
## Qué incluye
 
- **Diseño en Figma** de las pantallas para móvil, tableta y escritorio, y una web fiel a él.
- **Sistema de diseño:** variables CSS con los valores del Figma y componentes con variantes y estados.
- **Modo claro y oscuro**, con la elección guardada en el navegador.
- **CSS propio con BEM**, sin Tailwind ni Alpine.
- **Accesible:** navegación por teclado, foco visible y contraste comprobado.
## Cómo está organizado el CSS
 
Todo está en `resources/css/`. `app.css` solo importa los demás archivos, en este orden:
 
| Carpeta | Para qué sirve |
|---|---|
| `base/` | `variables.css` (tokens del Figma) y `global.css` (reset, foco, accesibilidad). |
| `layout/` | Estructura de página: `app`, `guest`, `navigation` y `footer`. |
| `components/` | Un archivo por componente Blade (botón, campo, tarjeta...). |
| `pages/` | Estilos propios de cada página. |
| `theme/` | `light.css` y `dark.css`: valores de cada tema. |
 
Detalles importantes:
- Los nombres siguen **BEM en español**: `bloque__elemento--modificador` (por ejemplo `.boton--lima` o `.campo__etiqueta`).
- Los estilos usan **clases**, sin selectores de `id` y sin `!important` (salvo la regla de movimiento reducido).
- Ningún componente escribe un color a mano: usan variables, así que cambiar de tema o de color es editar una línea.
## Sistema de diseño
 
**Tokens** (`base/variables.css`): sus nombres coinciden con los estilos del Figma.
 
| Grupo | Variables |
|---|---|
| Colores de marca | `--color-fondo`, `--color-violeta`, `--color-azul`, `--color-verde`, `--color-lima`, `--color-tinta`, `--color-tinta-2` |
| Tipografía | `--fuente-base` (Poppins), `--texto-xs` a `--texto-3xl`, `--peso-*`, `--interlineado-*` |
| Espaciado y forma | `--espacio-xs` a `--espacio-3xl`, `--radio-s` a `--radio-pill`, `--sombra-s`, `--sombra-m` |
 
**Temas:** los componentes no usan los colores de marca directamente, sino nombres con significado (`--superficie-tarjeta`, `--texto-principal`, `--texto-suave`, `--borde`, `--foco`). `light.css` y `dark.css` dan un valor distinto a cada uno. `tema.js` pone la clase `light` o `dark` en `<html>`; la primera vez sigue el tema del sistema.
 
**Componentes** (`resources/views/components/`), cada uno con su CSS del mismo nombre:
 
| Componente | Variantes y estados |
|---|---|
| `<x-boton>` | `primario`, `contorno`, `lima`, `texto`, `deshabilitado` |
| `<x-campo>` | normal, foco, error y deshabilitado |
| `<x-card>` | tarjeta base, se usa en toda la web |
| `<x-bicicleta-card>` | normal y seleccionada |
| `<x-insignia>` | `confirmada`, `pendiente`, `gris` |
| `<x-chip>` | normal y activo |
| `<x-franja-horaria>` | normal, elegida y deshabilitada |
| `<x-calendario>` | día de hoy y día elegido |
| `<x-cabecera-pagina>` | clara y oscura |
 
## Layouts Blade
 
- Hay dos layouts: `<x-app-layout>` para la web y `<x-guest-layout>` para inicio de sesión y registro.
- Navbar, barra inferior móvil y footer son parciales que leen sus enlaces de `config/navegacion.php`: para añadir una página se cambia un solo archivo.
- Hay un único `@vite` en `layouts/partials/head.blade.php`, incluido desde los dos layouts.
## Tailwind y Alpine
 
Los dos están retirados: no hay `tailwind.config.js` ni `postcss.config.js`, y `package.json` solo tiene Vite y su plugin de Laravel. Se puede comprobar con:
 
```bash
grep -rniE "tailwind" . --exclude-dir=node_modules --exclude-dir=vendor --exclude-dir=.git --exclude-dir=storage --exclude-dir=build --exclude=package-lock.json
```
 
Solo debería encontrar descripciones de paquetes de PHP en `composer.lock`.
 
## Responsive y accesibilidad
 
- **Mobile-first:** los estilos base son los de móvil y las media queries solo usan `min-width` (`40rem`, `48rem`, `64rem`). En móvil la navegación es una barra inferior; desde tableta, la navbar superior.
- **Teclado:** enlace «Saltar al contenido», `aria-current` en la página actual y `:focus-visible` con un color de foco que cambia según el tema.
- **Formularios:** cada campo tiene su `<label>` y los errores se enlazan con `aria-describedby` y `aria-invalid`.
- **Contraste:** los pares de colores se calcularon con la fórmula de WCAG (por ejemplo, texto secundario sobre el fondo, 4,93:1; violeta sobre blanco, 6,71:1).
- **Movimiento:** `prefers-reduced-motion` reduce las animaciones.
## Carga con Vite
 
`resources/css/app.css` es el único CSS que se carga, junto con `app.js`. Para añadir un archivo de estilos, se importa en `app.css`.
 
## Cómo ejecutar el proyecto
 
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
 
1. Pulsa la luna/sol de la barra superior y recarga: el tema se mantiene. Recorre las páginas en los dos temas.
2. Con el teclado, pulsa Tab nada más cargar: aparece «Saltar al contenido». Recorre la página y comprueba que el foco siempre se ve.
3. Reduce la ventana a 360 px: aparece la barra inferior y no hay desbordamientos. Súbela a 768 px y a 1440 px.
4. Amplía el zoom al 200 %: el contenido sigue siendo legible y utilizable.
5. En el inicio de sesión, envía el formulario vacío: los errores aparecen junto a cada campo.
