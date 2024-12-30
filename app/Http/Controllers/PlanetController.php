<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class PlanetController extends Controller
{
    public function index(Request $request)
    {
        // Array van planeten (simulatie van een database)
        $planets = collect([
            ['name' => 'Mercurius', 'info' => 'Dichtst bij de zon'],
            ['name' => 'Venus', 'info' => 'Hete planeet'],
            ['name' => 'Aarde', 'info' => 'Onze thuisplaneet'],
            ['name' => 'Mars', 'info' => 'De rode planeet'],
            ['name' => 'Jupiter', 'info' => 'Grootste planeet'],
        ]);

        // Controleer of de GET-parameter 'planet' aanwezig is
        if ($request->has('planet')) {
            $filterPlanet = strtolower($request->get('planet'));
            $planets = $planets->filter(function ($planet) use ($filterPlanet) {
                return strtolower($planet['name']) === $filterPlanet;
            });
        }

        // Retourneer de gefilterde of volledige lijst
        return response()->json($planets->values());
    }
}
