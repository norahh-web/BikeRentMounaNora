<?php

namespace Database\Seeders;

use App\Models\Bike;
use Illuminate\Database\Seeder;

class BikeSeeder extends Seeder
{
        /** Foto por tipo de bici (enlaces externos) */
    public const IMAGENES = [
        'Urbana' => 'https://cdn.sportscape.group/media/catalog/product/cache/1/image/800x800/040ec09b1e35df139433887a97daa66f/K/r/Kross_Nov26-TRANS-1-0-SR-black-grey-m_1.webp',
        'Eléctrica' => 'https://es.fiido.com/cdn/shop/files/1-c11-new-logo_ab26d3fa-8fc1-4d5d-af57-2fb35fce6923_1000x.webp?v=1781166845',
        'Montaña' => 'https://cdn11.bigcommerce.com/s-rlpcmj2qmd/images/stencil/2000x2000/products/73034/653525/131393__79507.1790636929.jpg?c=1',
        'Infantil' => 'https://shopbici.com/wp-content/uploads/2026/09/woom-explore5-woom-red-tres-cuartos.jpg',
    ];

    public function run(): void
    {
        $bicis = [
            [
                'serial_number' => 'BK-URB-001',
                'model' => 'Bici urbana',
                'tipo' => 'Urbana',
                'descripcion' => 'Cómoda y ligera para moverte por la ciudad.',
                'price_per_hour' => 3,
                'imagen' => 'images/bicis/urbana.jpg',
            ],
            [
                'serial_number' => 'BK-ELE-001',
                'model' => 'Bici eléctrica',
                'tipo' => 'Eléctrica',
                'descripcion' => 'Asistencia al pedaleo para llegar más lejos sin esfuerzo.',
                'price_per_hour' => 6,
                'imagen' => 'images/bicis/electrica.svg',
            ],
            [
                'serial_number' => 'BK-MON-001',
                'model' => 'Bici de montaña',
                'tipo' => 'Montaña',
                'descripcion' => 'Suspensión y cambios para caminos y senderos.',
                'price_per_hour' => 5,
                'imagen' => 'images/bicis/montana.svg',
            ],
            [
                'serial_number' => 'BK-INF-001',
                'model' => 'Bici infantil',
                'tipo' => 'Infantil',
                'descripcion' => 'Segura y a medida para los más pequeños.',
                'price_per_hour' => 2,
                'imagen' => 'images/bicis/infantil.svg',
            ],
        ];

        foreach ($bicis as $bici) {
            $bici['imagen'] = self::IMAGENES[$bici['tipo']];
            Bike::updateOrCreate(['serial_number' => $bici['serial_number']], $bici);
        }

    }
}
