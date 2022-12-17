<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use App\Models\Puntaje;
use Illuminate\Http\Request;
use App\Http\Requests\StorePregunta;
use Illuminate\Support\Facades\DB;

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

    public function numero($id){
        $numero = DB::table('preguntas')
            ->join('puntajes', function ($join) {
                $join->on('puntajes.id', '=', 'preguntas.puntaje_id');
            })
            ->select(\DB::raw('COUNT(preguntas.puntaje_id) AS pregunta_id'))
            ->where('puntaje_id','=',$id)
            ->groupBy('puntaje_id')
            ->get();
        if(count($numero) == 0){
            return count($numero) + 1;
        }else{
            return $numero[0]->pregunta_id + 1;
        }
    }

    public function store(StorePregunta $request)
    {
        Pregunta::create($request->post());
        return redirect()->route('pregunta.index');
    }

    public function edit(Pregunta $pregunta, $id)
    {
        $puntajes = Puntaje::all();
        $pregunta = Pregunta::findOrFail($id);
        return view('pregunta.edit',compact('pregunta','puntajes'));
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
