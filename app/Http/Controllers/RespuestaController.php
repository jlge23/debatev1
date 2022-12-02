<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use App\Models\Respuesta;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRespuestas;
use Illuminate\Support\Facades\DB;

class RespuestaController extends Controller
{
    public function index()
    {
        $respuestas = Respuesta::all();
        return view('respuesta.index', compact('respuestas'));
    }

    public function create()
    {
        $preguntas = Pregunta::whereNotIn('id', DB::table('respuestas')->pluck('pregunta_id'))->get();
        return view('respuesta.create',compact('preguntas'));
    }

    public function store(StoreRespuestas $request)
    {
        $pregunta = Pregunta::findOrFail($request->pregunta_id);
        switch($pregunta->puntaje_id){
            case 1://verdadero y falso
                $R = new Respuesta;
                $R->pregunta_id = $request->pregunta_id;
                $R->respuesta = $request->respuesta;
                $R->validez = $request->validez;
                $R->status = 1;
                $R->save();
                unset($R);
            break;
            case 2://seleccion simple 
                foreach($request->respuesta as $key => $value){
                    $R = new Respuesta;
                    $R->pregunta_id = $request->pregunta_id;
                    $R->respuesta = $value;
                    $R->validez = $request->validez == $key+1 ? 1 : 0;
                    $R->status = 1;
                    $R->save();
                    unset($R);
                }
            break;
            case 3://desarrollo
                $R = new Respuesta;
                $R->pregunta_id = $request->pregunta_id;
                $R->respuesta = $request->respuesta;
                $R->validez = $request->validez;
                $R->status = 1;
                $R->save();
                unset($R);
            break;
        }
        return redirect()->route('respuesta.index');
    }

    public function edit(Respuesta $respuesta, $id)
    {
        $respuesta = Respuesta::where('pregunta_id','=',$id)->with('pregunta')->get();
        return view('respuesta.edit',compact('respuesta'));
    }

    public function update(Request $request)
    {
        return $request->all();
        /* 
        $respuesta = Respuesta::findOrFail($request->id);
        $respuesta->update($request->all());
        return redirect(route('respuesta.index')); */
    }

    public function destroy($id)
    {
        $respuesta = Respuesta::findOrFail($id);
        $respuesta->delete();
        return redirect()->route('respuesta.index');
    }
}
