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
use SebastianBergmann\LinesOfCode\NegativeValueException;

class JuegoController extends Controller
{
    public function index()
    {
        $actual = DB::table('juegos')
                    ->join('equipos', function ($join) {
                        $join->on('equipos.id', '=', 'juegos.equipo_id');
                    })
                    ->select('equipos.nombre AS name',\DB::raw('SUM(juegos.puntos) AS y'))
                    ->groupBy('equipos.nombre')
                    ->orderBy('equipos.id')
                    ->get();
        $evento = Evento::where('status','=',1)->get();//devuelve informacion del Evento activo
        $juego = Juego::orderBy('id','desc')->first();//Devuelve el ultimo 'id' con ordenamiento decreciente
        $equipos = Equipo::select(DB::raw('COUNT(id) as id'))->first();//devuelve la cantidad de equipos registrados
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

    public function comodin($opt)
    {
        $puntajes = Puntaje::all();
        if(isset($opt)){
            switch($opt){
                case 0 : //activar comodines;
                    foreach($puntajes as $puntaje){
                        $valor1 = $puntaje->comodin;//10
                        $valor2 = $puntaje->valor;//3
                        $puntaje->valor = $valor1;//10
                        $puntaje->comodin = $valor2;//3
                        $puntaje->save();
                        unset($puntaje);
                        
                    }
                    return 1;
                break;
                case 1 : //desactivar comodines;
                    foreach($puntajes as $puntaje){
                        $valor1 = $puntaje->comodin;//3
                        $valor2 = $puntaje->valor;//10
                        $puntaje->valor = $valor1;//3
                        $puntaje->comodin = $valor2;//10
                        $puntaje->save();
                        unset($puntaje);
                        
                    }
                    return 0;
                break;
            }
        }
           
        //return view('juego.index', compact('eventos'));
    }
    public function findEquipos(){
        $EquipoIglesia = Equipo::with('iglesia')->get(); 
        return $EquipoIglesia;
    }

    public function findPreguntas(){
        $data = array();
        $preguntas = Pregunta::all();
        foreach($preguntas as $pregunta){
            $data['data'][] = array(
                'id' => $pregunta->id,
                'descripcion' => $pregunta->descripcion,
                'tipo' => $pregunta->puntaje->nombre,
                'tiempo' => $pregunta->tiempo,
                'puntaje' => $pregunta->puntaje->valor,
                'comodin' => $pregunta->puntaje->comodin,
                'status' => $pregunta->status
            );
        }
        return $data;
    }

    public function info(){
        return view('juego.info');
    }

    public function store(StoreJuegoRequest $request)
    {
        Pregunta::create($request->post());
        return redirect()->route('pregunta.index');
    }

    public function edit(Pregunta $pregunta, $idpregunta, $equipo)
    {
        $evento = Evento::where('status','=',1)->get();//devuelve informacion del Evento activo
        $equipo = Equipo::with('iglesia')->find($equipo);
        $pregunta = $pregunta->with('puntaje')->with('respuestas')->find($idpregunta);
        return view('juego.edit', compact('pregunta','equipo','evento'));
    }

    public function update(Request $request)
    {
        switch($request->puntaje_id){
            case 1://Verdadero y falso
                //return $request->all();die();
                $evento = Evento::where('status','=',1)->get();//devuelve informacion del Evento activo
                $juego = new Juego([
                    'fecha' => date('Y-m-d'),
                    'puntos' => ($request->validez === $request->r_correcta and $request->puntos > 0)? $request->puntos : 0,
                    'tiempo' => $request->duracion,
                    'seleccion' => $request->validez,
                    'acierto' => ($request->validez === $request->r_correcta and $request->puntos > 0)? 1 : 0,
                    'equipo_id' => $request->equipo,
                    'evento_id' => $evento[0]->id,
                    'respuesta_id' => $request->respuesta_id
                ]);
                $juego->save();
                unset($juego);
                Pregunta::where('id',$request->pregunta_id)->update(['status'=>0]);
                return redirect(route('juego.index'));
            break;
            case 2://seleccion simple
                //return $request->all();die();
                $evento = Evento::where('status','=',1)->get();//devuelve informacion del Evento activo
                $juego = new Juego([
                    'fecha' => date('Y-m-d'),
                    'puntos' => ($request->respuesta_id === $request->seleccion and $request->puntos > 0)? $request->puntos : 0,
                    'tiempo' => $request->duracion,
                    'seleccion' => $request->seleccion,
                    'acierto' => ($request->respuesta_id === $request->seleccion and $request->puntos > 0)? 1 : 0,
                    'equipo_id' => $request->equipo,
                    'evento_id' => $evento[0]->id,
                    'respuesta_id' => $request->respuesta_id
                ]);
                $juego->save();
                unset($juego);
                Pregunta::where('id',$request->pregunta_id)->update(['status'=>0]);
                return redirect(route('juego.index'));
            break;
            case 3://desarrollo
                //return $request->all();die();
                $evento = Evento::where('status','=',1)->get();//devuelve informacion del Evento activo
                $juego = new Juego([
                    'fecha' => date('Y-m-d'),
                    'puntos' => $request->opcion,
                    'tiempo' => $request->duracion,
                    'seleccion' => $request->opcion,
                    'acierto' => ($request->opcion > 0)? 1 : 0,
                    'equipo_id' => $request->equipo,
                    'evento_id' => $evento[0]->id,
                    'respuesta_id' => $request->respuesta_id
                ]);
                $juego->save();
                unset($juego);
                Pregunta::where('id',$request->pregunta_id)->update(['status'=>0]);
                return redirect(route('juego.index'));
            break;
        }
    }

    public function destroy($id)
    {
        /* $pregunta = Pregunta::findOrFail($id);
        $pregunta->delete();
        return redirect()->route('pregunta.index'); */
    }
}
