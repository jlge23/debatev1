<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Evento;
use App\Models\Juego;
use App\Models\Pregunta;
use App\Models\Equipo;

class InformeController extends Controller
{
    public function index()
    {
        $evento = Evento::where('status','=',1)->get();//devuelve informacion del Evento activo
        return view('informe.index',compact('evento'));
    }

    public function resultados(){
        $evento = Evento::where('status','=',1)->get();//devuelve informacion del Evento activo
        $juegos = DB::table('juegos')
            ->join('equipos', function ($join) {
                $join->on('equipos.id', '=', 'juegos.equipo_id');})
            ->join('preguntas', function ($join) {
                $join->on('preguntas.id', '=', 'juegos.pregunta_id');})
            ->join('puntajes', function ($join) {
                $join->on('puntajes.id', '=', 'preguntas.puntaje_id');})
            ->select('juegos.id','equipos.nombre','puntajes.nombre AS tipo','preguntas.pregunta','preguntas.respuesta','juegos.acierto','juegos.puntos','juegos.tiempo')
            ->where('juegos.evento_id','=',$evento[0]->id)
            ->orderBy('juegos.id','asc')->get();
        foreach($juegos as $juego){
            $data['data'][] = array(
                'id' => $juego->id,
                'nombre' => $juego->nombre,
                'tipo' => $juego->tipo,
                'descripcion' => $juego->pregunta,
                'respuesta' => $juego->respuesta,
                'acierto' => $juego->acierto,
                'puntos' => $juego->puntos,
                'tiempo' => $juego->tiempo
            );
        }
        if(empty($data)){
            return $data['data'][] = 'null';
        }else{
            return $data;
        }
    }

    public function graficos($grafico){
        $evento = Evento::where('status','=',1)->get();//devuelve informacion del Evento activo
        switch($grafico){
            case 0:
                $equipos = DB::table('juegos')
                    ->join('equipos', function ($join) {
                        $join->on('equipos.id', '=', 'juegos.equipo_id');
                    })
                    ->select('equipos.id','equipos.nombre')
                    ->where('juegos.evento_id','=',$evento[0]->id)
                    ->groupBy('equipos.id','equipos.nombre')
                    ->orderBy('equipos.id')
                    ->get();

                foreach($equipos as $key => $equipo){
                    $A['categories'][$key] = array($equipo->nombre);
                }
                    $A['series'][0] = array('name' => 'ACIERTOS');
                foreach($equipos as $key => $equipo){
                    $C1 = Juego::select(DB::raw('COUNT(juegos.acierto) AS data'))->where('acierto','=',1)->where('evento_id','=',$evento[0]->id)->where('equipo_id','=',$equipo->id)->get();
                    $A['series'][0]['data'][$key] = array($C1[0]->data);
                }
                    $A['series'][1] = array('name' => 'DESACIERTOS');
                foreach($equipos as $key => $equipo){
                    $C2 = Juego::select(DB::raw('COUNT(juegos.acierto) AS data'))->where('acierto','=',0)->where('evento_id','=',$evento[0]->id)->where('equipo_id','=',$equipo->id)->get();
                    $A['series'][1]['data'][$key] = array($C2[0]->data);
                }
                return json_encode($A,JSON_NUMERIC_CHECK);

            break;
            case 1:
                $equipos = DB::table('juegos')
                    ->join('equipos', function ($join) {
                        $join->on('equipos.id', '=', 'juegos.equipo_id');
                    })
                    ->select('equipos.nombre AS name',\DB::raw('SUM(juegos.puntos) AS y'),'equipos.nombre AS drilldown')
                    ->where('juegos.evento_id','=',$evento[0]->id)
                    ->groupBy('equipos.nombre')
                    ->orderBy('equipos.id')
                    ->get();
                return json_encode($equipos,JSON_NUMERIC_CHECK);
            break;
            case 2:
                $equipos = DB::table('juegos')
                    ->join('equipos', function ($join) {
                        $join->on('equipos.id', '=', 'juegos.equipo_id');
                    })
                    ->select('equipos.nombre AS name',\DB::raw('SUM(juegos.puntos) AS y'))
                    ->where('juegos.evento_id','=',$evento[0]->id)
                    ->groupBy('equipos.nombre')
                    ->orderBy('equipos.id')
                    ->get();
                return json_encode($equipos,JSON_NUMERIC_CHECK);
            break;
            case 3:
                $arr[] = array();
                $equipos = DB::table('juegos')
                    ->join('equipos', function ($join) {
                        $join->on('equipos.id', '=', 'juegos.equipo_id');
                    })
                    ->select('equipos.id','equipos.nombre')
                    ->where('juegos.evento_id','=',$evento[0]->id)
                    ->groupBy('equipos.id','equipos.nombre')
                    ->orderBy('equipos.id')
                    ->get();
                foreach($equipos as $k =>$value){
                    $tiempo = Juego::select('juegos.tiempo')->where('juegos.equipo_id','=',$value->id)->where('juegos.evento_id','=',$evento[0]->id)->groupBy('juegos.id','juegos.tiempo')->get();
                    $arr[$k] = array('name' => $value->nombre);
                    foreach($tiempo as $key => $t){
                        $arr[$k]['data'][$key] = array($t->tiempo);
                    }
                }

                return json_encode($arr,JSON_NUMERIC_CHECK);
            break;
            case 4:
                $arr[] = array();
                $preguntas = Pregunta::select(
                    \DB::raw('CASE WHEN status = 1 THEN "Activas" WHEN status = 0 THEN "Inactivas" END AS pregunta'),
                    \DB::raw('COUNT(status) AS status'))->groupBy('status')->get();
                foreach($preguntas as $key => $value){
                    $arr[$key] = array($value->pregunta,$value->status);
                }
                return json_encode($arr,JSON_NUMERIC_CHECK);
            break;
        }

    }
}
