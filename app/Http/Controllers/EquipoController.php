<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateEquipo;
use App\Http\Requests\StoreEquipo;
use App\Models\Iglesia;

class EquipoController extends Controller
{
    public function index()
    {
        $equipos = Equipo::all();
        return view('equipo.index', compact('equipos'));
    }

    public function create()
    {
        $iglesias = Iglesia::all();
        return view('equipo.create',compact('iglesias'));
    }

    public function store(StoreEquipo $request)
    {
        Equipo::create($request->post());
        return redirect()->route('equipo.index');
    }

    public function edit(Equipo $equipo, $id)
    {
        $iglesias = Iglesia::all();
        $equipo = Equipo::findOrFail($id);
        return view('equipo.edit',compact('equipo','iglesias'));
    }

    public function update(UpdateEquipo $request)
    {
        $equipo = Equipo::findOrFail($request->id);
        $equipo->update($request->all());
        return redirect(route('equipo.index'));
    }

    public function destroy($id)
    {
        $equipo = Equipo::findOrFail($id);
        $equipo->delete();
        return redirect()->route('equipo.index');
    }
}
