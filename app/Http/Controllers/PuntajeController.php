<?php

namespace App\Http\Controllers;

use App\Models\Puntaje;
use Illuminate\Http\Request;
use App\Http\Requests\StorePuntaje;

class PuntajeController extends Controller
{
    public function index()
    {
        $puntajes = Puntaje::all();
        return view('puntaje.index', compact('puntajes'));
    }

    public function create()
    {
        $tiempos = Puntaje::all();
        return view('puntaje.create',compact('tiempos'));
    }

    public function store(Request $request)
    {
        Puntaje::create($request->post());
        return redirect()->route('puntaje.index');
    }

    public function edit(Puntaje $puntaje, $id)
    {
        $tiempos = Puntaje::all();
        $puntaje = Puntaje::findOrFail($id);
        return view('puntaje.edit',compact('puntaje','tiempos'));
    }

    public function update(Request $request)
    {
        $puntaje = Puntaje::findOrFail($request->id);
        $puntaje->update($request->all());
        return redirect(route('puntaje.index'));
    }

    public function destroy($id)
    {
        $puntaje = Puntaje::findOrFail($id);
        $puntaje->delete();
        return redirect()->route('puntaje.index');
    }
}
