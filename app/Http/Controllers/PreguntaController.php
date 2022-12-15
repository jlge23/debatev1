<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use App\Models\Puntaje;
use Illuminate\Http\Request;
use App\Http\Requests\StorePregunta;

class PreguntaController extends Controller
{
    public function index()
    {
        $preguntas = Pregunta::all();
        return view('pregunta.index', compact('preguntas'));
    }

    public function create()
    {
        $puntajes = Puntaje::all();
        return view('pregunta.create',compact('puntajes'));
    }

    public function store(StorePregunta $request)
    {
        Pregunta::create($request->post());
        return redirect()->route('pregunta.index');
    }

    public function edit(Pregunta $pregunta, $id)
    {
        //$tiempos = Pregunta::select('tiempo')->orderBy('tiempo','asc')->groupBy('tiempo')->get();
        $tiempos = Pregunta::select('tiempo')->orderBy('tiempo','asc')->get();
        $puntajes = Puntaje::all();
        $pregunta = Pregunta::findOrFail($id);
        return view('pregunta.edit',compact('pregunta','puntajes','tiempos'));
    }

    public function update(Request $request)
    {
        $pregunta = Pregunta::findOrFail($request->id);
        $pregunta->update($request->all());
        return redirect(route('pregunta.index'));
    }

    public function destroy($id)
    {
        $pregunta = Pregunta::findOrFail($id);
        $pregunta->delete();
        return redirect()->route('pregunta.index');
    }
}
