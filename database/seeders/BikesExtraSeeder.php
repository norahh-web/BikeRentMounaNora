<?php

namespace Database\Seeders;

use App\Models\Bike;
use Illuminate\Database\Seeder;

class BikesExtraSeeder extends Seeder
{
    public function run(): void
    {
        $bicis = [
            ['serial_number' => 'BK-URB-002', 'model' => 'Urbana clásica', 'tipo' => 'Urbana', 'descripcion' => 'Cómoda y estable para pasear por la ciudad.', 'price_per_hour' => 3, 'imagen' => 'images/bicis/urbana.svg'],
            ['serial_number' => 'BK-URB-003', 'model' => 'Urbana paseo', 'tipo' => 'Urbana', 'descripcion' => 'Cesta delantera y sillín ancho para trayectos tranquilos.', 'price_per_hour' => 3, 'imagen' => 'images/bicis/urbana.svg'],
            ['serial_number' => 'BK-URB-004', 'model' => 'Urbana ligera', 'tipo' => 'Urbana', 'descripcion' => 'Cuadro de aluminio, ideal para el día a día.', 'price_per_hour' => 3, 'imagen' => 'images/bicis/urbana.svg'],
            ['serial_number' => 'BK-URB-005', 'model' => 'Urbana retro', 'tipo' => 'Urbana', 'descripcion' => 'Estilo clásico con guardabarros y timbre.', 'price_per_hour' => 3, 'imagen' => 'images/bicis/urbana.svg'],
            ['serial_number' => 'BK-ELE-002', 'model' => 'Eléctrica city', 'tipo' => 'Eléctrica', 'descripcion' => 'Asistencia suave al pedaleo para moverte por la ciudad.', 'price_per_hour' => 6, 'imagen' => 'images/bicis/electrica.svg'],
            ['serial_number' => 'BK-ELE-003', 'model' => 'Eléctrica confort', 'tipo' => 'Eléctrica', 'descripcion' => 'Batería de larga duración y sillín acolchado.', 'price_per_hour' => 6, 'imagen' => 'images/bicis/electrica.svg'],
            ['serial_number' => 'BK-ELE-004', 'model' => 'Eléctrica plegable', 'tipo' => 'Eléctrica', 'descripcion' => 'Compacta y fácil de guardar, con asistencia al pedaleo.', 'price_per_hour' => 6, 'imagen' => 'images/bicis/electrica.svg'],
            ['serial_number' => 'BK-ELE-005', 'model' => 'Eléctrica carga', 'tipo' => 'Eléctrica', 'descripcion' => 'Portaequipajes reforzado para llevar mochila o compras.', 'price_per_hour' => 6, 'imagen' => 'images/bicis/electrica.svg'],
            ['serial_number' => 'BK-MON-002', 'model' => 'Montaña trail', 'tipo' => 'Montaña', 'descripcion' => 'Neumáticos anchos para caminos de tierra y senderos.', 'price_per_hour' => 5, 'imagen' => 'images/bicis/montana.svg'],
            ['serial_number' => 'BK-MON-003', 'model' => 'Montaña pro', 'tipo' => 'Montaña', 'descripcion' => 'Suspensión delantera y 21 velocidades.', 'price_per_hour' => 5, 'imagen' => 'images/bicis/montana.svg'],
            ['serial_number' => 'BK-MON-004', 'model' => 'Montaña aventura', 'tipo' => 'Montaña', 'descripcion' => 'Frenos de disco para bajadas con seguridad.', 'price_per_hour' => 5, 'imagen' => 'images/bicis/montana.svg'],
            ['serial_number' => 'BK-MON-005', 'model' => 'Montaña cross', 'tipo' => 'Montaña', 'descripcion' => 'Ligera y ágil para rutas por el monte.', 'price_per_hour' => 5, 'imagen' => 'images/bicis/montana.svg'],
            ['serial_number' => 'BK-INF-002', 'model' => 'Infantil aventura', 'tipo' => 'Infantil', 'descripcion' => 'Para niños de 6 a 9 años, con ruedines opcionales.', 'price_per_hour' => 2, 'imagen' => 'images/bicis/infantil.svg'],
            ['serial_number' => 'BK-INF-003', 'model' => 'Infantil junior', 'tipo' => 'Infantil', 'descripcion' => 'Para niños de 9 a 12 años, con cuadro ligero.', 'price_per_hour' => 2, 'imagen' => 'images/bicis/infantil.svg'],
            ['serial_number' => 'BK-INF-004', 'model' => 'Infantil mini', 'tipo' => 'Infantil', 'descripcion' => 'Para niños de 4 a 6 años, con ruedines.', 'price_per_hour' => 2, 'imagen' => 'images/bicis/infantil.svg'],
            ['serial_number' => 'BK-INF-005', 'model' => 'Infantil sport', 'tipo' => 'Infantil', 'descripcion' => 'Aspecto deportivo y frenos fáciles de usar.', 'price_per_hour' => 2, 'imagen' => 'images/bicis/infantil.svg'],
        ];

        foreach ($bicis as $bici) {
            $bici['imagen'] = BikeSeeder::IMAGENES[$bici['tipo']];
            Bike::updateOrCreate(['serial_number' => $bici['serial_number']], $bici);
        }

    }
}
