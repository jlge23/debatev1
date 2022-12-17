<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJuegoRequest;
use App\Models\Equipo;
use Illuminate\Http\Request;
use App\Models\Juego;
use App\Models\Evento;
use App\Models\Pregunta;
use App\Models\Puntaje;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;
use SebastianBergmann\LinesOfCode\NegativeValueException;

class JuegoController extends Controller
{
    public function index()
    {
        $evento = Evento::where('status','=',1)->get();//devuelve informacion del Evento activo
        if(count($evento) > 0){
            $actual = DB::table('juegos')
                        ->join('equipos', function ($join) {
                            $join->on('equipos.id', '=', 'juegos.equipo_id');
                        })
                        ->select('equipos.nombre AS name',\DB::raw('SUM(juegos.puntos) AS y'))
                        ->where('juegos.evento_id','=',$evento[0]->id)
                        ->groupBy('equipos.nombre')
                        ->orderBy('equipos.id')
                        ->get();
            $juego = Juego::where('juegos.evento_id','=',$evento[0]->id)->orderBy('id','desc')->first();//Devuelve el ultimo 'id' con ordenamiento decreciente
            $equipos = Equipo::select(DB::raw('COUNT(id) as id'))->first();//devuelve la cantidad de equipos registrados
            $progreso = Pregunta::select(\DB::raw('COUNT(preguntas.id) AS cuantos'))->where('status','=',0)->where('puntaje_id','!=',4)->get();
            if($progreso[0]->cuantos == 30){
                Puntaje::where('activo','=',0)->update(['activo'=>1]);
            }
            $Preg = Pregunta::all();
            if(count($Preg) == 0){
                $preguntas = -1;
                return view('juego.index',compact('preguntas','evento'));
            }else{
                $preguntas = Pregunta::select('id')->where('status','=',1)->orderBy('id','asc')->first();//devuelve el 'id' de la pregunta, siempre que tenga status=1, de forma ascendente
                if(!(gettype($preguntas) == 'NULL')){
                    $preguntas = 1;
                    switch(true){
                        case (gettype($juego) == 'NULL')://no hay datos en la tabla juego
                            $equipo = Equipo::find(1);
                            return view('juego.index',compact('equipo','evento','preguntas','actual'));
                        break;
                        case ($juego->equipo_id >= 1 and $juego->equipo_id < $equipos->id):
                            $equipo = Equipo::find(($juego->equipo_id + 1));
                            return view('juego.index',compact('equipo','evento','preguntas','actual'));
                        break;
                        case ($juego->equipo_id == $equipos->id):
                            $equipo = Equipo::find(1);
                            return view('juego.index',compact('equipo','evento','preguntas','actual'));
                        break;
                    }
                }else{
                    $preguntas = 0;
                    return view('juego.index',compact('preguntas','evento'));
                }
            }
        }else{
            return view('juego.index',compact('evento'));
        }
    }

    public function dificultad(){
        $data = array();
        $dificultades = DB::table('puntajes')
            ->join('preguntas', function ($join) {
                $join->on('puntajes.id', '=', 'preguntas.puntaje_id');
            })
            ->select('puntajes.id','puntajes.nombre','puntajes.tiempo',\DB::raw('COUNT(preguntas.id) AS cantidad'))
            ->where('preguntas.status','=',1)
            ->where('puntajes.activo','=',1)
            ->groupBy('puntajes.id','puntajes.nombre','puntajes.tiempo')
            ->orderBy('puntajes.nombre','DESC')
            ->get();
        if(count($dificultades) > 0){
            foreach($dificultades as $dificultad){
                $data['data'][] = array(
                    'id' => $dificultad->id,
                    'nombre' => $dificultad->nombre,
                    'tiempo' => $dificultad->tiempo,
                    'cantidad' => $dificultad->cantidad
                );
            }
            return $data;
        }else{
            $data = $data[] = null;
            return $data;
        }

    }

    public function preguntas($id){
        $data = array();
        $preguntas = Pregunta::where('status','=',1)->where('puntaje_id','=',$id)->orderBy('numero','asc')->get();
        if(count($preguntas) == 0){
            return $data = $data[] = null;
        }else{
            foreach($preguntas as $pregunta){
                $data['data'][] = array(
                    'id' => $pregunta->id,
                    'numero' => $pregunta->numero,
                    'punto' => $pregunta->punto
                );
            }
            return $data;
        }
    }

    public function store(StoreJuegoRequest $request)
    {
        Pregunta::create($request->post());
        return redirect()->route('pregunta.index');
    }

    public function edit($e, $p)
    {
        $evento = Evento::where('status','=',1)->get();//devuelve informacion del Evento activo
        $equipo = Equipo::with('iglesia')->find($e);
        $pregunta = Pregunta::with('puntaje')->where('preguntas.status','=',1)->where('preguntas.id','=',$p)->get();
        return view('juego.edit', compact('pregunta','equipo','evento'));
    }

    public function update(Request $request)
    {
        //return $request->all();die();
        switch($request->puntaje_id){
            case 4://comodines
                $evento = Evento::where('status','=',1)->get();//devuelve informacion del Evento activo
                $juego = new Juego([
                    'fecha' => date('Y-m-d'),
                    'puntos' => ($request->validez == 1 and $request->opcion > 0) ? $request->opcion : 0,
                    'tiempo' => $request->duracion,
                    'acierto' => ($request->validez == 1 and $request->opcion > 0) ? 1 : 0,
                    'equipo_id' => $request->equipo,
                    'evento_id' => $evento[0]->id,
                    'pregunta_id' => $request->pregunta_id
                ]);
                $juego->save();
                unset($juego);
                Pregunta::where('id',$request->pregunta_id)->update(['status'=>0]);
                return redirect(route('juego.index'));
            break;
            default://preguntas normales
                $evento = Evento::where('status','=',1)->get();//devuelve informacion del Evento activo
                $juego = new Juego([
                    'fecha' => date('Y-m-d'),
                    'puntos' => ($request->validez == 1 and $request->puntos > 0) ? $request->puntos : 0,
                    'tiempo' => $request->duracion,
                    'acierto' => ($request->validez == 1 and $request->puntos > 0) ? 1 : 0,
                    'equipo_id' => $request->equipo,
                    'evento_id' => $evento[0]->id,
                    'pregunta_id' => $request->pregunta_id
                ]);
                $juego->save();
                unset($juego);
                Pregunta::where('id',$request->pregunta_id)->update(['status'=>0]);
                return redirect(route('juego.index'));
        }
    }

    public function reset() //reiniciar juego
    {
        Juego::truncate();
        DB::table('preguntas')->update(['status' => 1]);
        Puntaje::where('id','=',4)->update(['activo'=>0]);
        return redirect()->route('juego.index');
    }

    public function destroy($id)
    {
        /* $pregunta = Pregunta::findOrFail($id);
        $pregunta->delete();
        return redirect()->route('pregunta.index'); */
    }
}
