<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Iglesia;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEvento;
use App\Http\Requests\UpdateEvento;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::all();
        return view('evento.index', compact('eventos'));
    }

    public function create()
    {
        $iglesias = Iglesia::all();
        return view('evento.create',compact('iglesias'));
    }

    public function store(StoreEvento $request)
    {
        Evento::create($request->post());
        return redirect()->route('evento.index');
    }

    public function edit(Evento $evento, $id)
    {
        $iglesias = Iglesia::all();
        $evento = Evento::findOrFail($id);
        return view('evento.edit',compact('evento','iglesias'));
    }

    public function update(Request $request)
    {
        $evento = Evento::findOrFail($request->id);
        $evento->update($request->all());
        return redirect(route('evento.index'));
    }

    public function destroy($id)
    {
        $evento = Evento::findOrFail($id);
        $evento->delete();
        return redirect()->route('evento.index');
    }
}
