<?php

namespace App\Http\Controllers;

use App\Models\Bike;

class HomeController extends Controller
{
    // Página de inicio: portada y bicis disponibles
    public function index()
    {
        $bicis = Bike::where('status', 'available')->orderBy('id')->get();

        return view('home', compact('bicis'));
    }
}
