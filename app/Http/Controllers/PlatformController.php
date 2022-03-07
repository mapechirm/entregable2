<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use App\Models\PlatformVideogame;
use Illuminate\Http\Request;
use App\Models\Videogame;

class PlatformController extends Controller
{
    public function index () {
        return view('platforms.plataformas', [
            "plataformas" => Platform::all()
        ]);
    }

    public function show (Platform $plataforma) {
        return view('platforms.verPlataforma', [
            "videogames" => $plataforma -> videogames,
            "plataforma" => $plataforma -> nombre
        ]);
    }
}
