<?php

namespace App\Http\Controllers;

use App\Models\Bike;

class BikeController extends Controller
{
    // Página de inicio: portada y bicis disponibles
    public function index()
    {
        $bicis = Bike::where('status', 'available')->orderBy('id')->get()->unique('tipo')->values();

        return view('home', compact('bicis'));
    }

    // Details of a specific bike
    public function show(Bike $bike)
    {
        return view('bikes.show', compact('bike'));
    }
}
