<?php

namespace Database\Seeders;

use App\Models\Bike;
use Illuminate\Database\Seeder;

class BikeSeeder extends Seeder
{
    public function run(): void
    {
        $bicis = [
            [
                'serial_number' => 'BK-URB-001',
                'model' => 'Bici urbana',
                'tipo' => 'Urbana',
                'descripcion' => 'Cómoda y ligera para moverte por la ciudad.',
                'price_per_hour' => 3,
                'imagen' => 'images/bicis/urbana.svg',
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
            Bike::create($bici);
        }
    }
}
