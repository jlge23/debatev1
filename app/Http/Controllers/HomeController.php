<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Evento;
use App\Models\Iglesia;
use App\Models\Juego;
use App\Models\Pregunta;
use App\Models\Puntaje;
use App\Models\Respuesta;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $iglesias = Iglesia::select(\DB::raw('COUNT(*) AS iglesia'))->get();
        $eventos = Evento::select(\DB::raw('COUNT(*) AS evento'))->get();
        $equipos = Equipo::select(\DB::raw('COUNT(*) AS equipo'))->get();
        $puntajes = Puntaje::select(\DB::raw('COUNT(*) AS puntaje'))->get();
        $preguntas = Pregunta::select(\DB::raw('COUNT(*) AS pregunta'))->get();
        $respuestas = Respuesta::select(\DB::raw('COUNT(*) AS respuesta'))->get();
        $juegos = Juego::select(\DB::raw('COUNT(*) AS juego'))->get();
        return view('home',compact('iglesias','eventos','equipos','puntajes','preguntas','respuestas','juegos'));
    }
}
