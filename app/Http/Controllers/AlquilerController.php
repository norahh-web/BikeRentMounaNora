<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use Illuminate\Http\Request;

class AlquilerController extends Controller
{
    // Página "Alquila tu bici": elegir bici, fecha y horas
    public function index(Request $request)
    {
        $bicis = Bike::where('status', 'available')->orderBy('id')->get();

        // Si venimos desde "Reservar" en el detalle, llega ?bici=ID
        $biciElegida = $request->query('bici');

        return view('alquiler', compact('bicis', 'biciElegida'));
    }
}
