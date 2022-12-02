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

    public function graficos($grafico){
        switch($grafico){
            case 1:
                $equipos = DB::table('juegos')
                    ->join('equipos', function ($join) {
                        $join->on('equipos.id', '=', 'juegos.equipo_id');
                    })
                    ->select('equipos.nombre AS name',\DB::raw('SUM(juegos.puntos) AS y'),'equipos.nombre AS drilldown')
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
                    ->groupBy('equipos.nombre')
                    ->orderBy('equipos.id')
                    ->get();
                return json_encode($equipos,JSON_NUMERIC_CHECK);
            break;
            case 3:
                /* $E = Equipo::select(\DB::raw('COUNT(id) AS e'))
                    ->whereIn('id', DB::table('juegos')->pluck('equipo_id'))->get();
                //return $E[0]->e;die();
                 */
                $arr[] = array();
                $equipos = DB::table('juegos')
                    ->join('equipos', function ($join) {
                        $join->on('equipos.id', '=', 'juegos.equipo_id');
                    })
                    ->select('equipos.id','equipos.nombre')
                    ->groupBy('equipos.id','equipos.nombre')
                    ->orderBy('equipos.id')
                    ->get();
                foreach($equipos as $k =>$value){
                    $tiempo = Juego::select('juegos.tiempo')->where('juegos.equipo_id','=',$value->id)->groupBy('juegos.id','juegos.tiempo')->get();
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

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
