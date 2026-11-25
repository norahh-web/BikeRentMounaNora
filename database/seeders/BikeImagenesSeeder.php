<?php

namespace Database\Seeders;

use App\Models\Bike;
use Illuminate\Database\Seeder;

class BikeImagenesSeeder extends Seeder
{
    /**
     * Asigna una foto a TODAS las bicis según su tipo.
     * Si el tipo no tiene foto propia, usa la de Urbana.
     */
    public function run(): void
    {
        Bike::query()->each(function (Bike $bici) {
            $bici->update([
                'imagen' => BikeSeeder::IMAGENES[$bici->tipo] ?? BikeSeeder::IMAGENES['Urbana'],
            ]);
        });
    }
}
