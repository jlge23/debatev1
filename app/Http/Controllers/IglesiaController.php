<?php

namespace App\Http\Controllers;

use App\Models\Iglesia;
use Illuminate\Http\Request;
use App\Http\Requests\StoreIglesia;
use App\Http\Requests\UpdateIglesia;

class IglesiaController extends Controller
{
    public function index()
    {
        $iglesias = Iglesia::all();
        return view('iglesia.index', compact('iglesias'));
    }

    public function create()
    {
        return view('iglesia.create');
    }

    public function store(StoreIglesia $request)
    {
        Iglesia::create($request->post());
        return redirect()->route('iglesia.index');
    }

    public function edit(Iglesia $iglesia,$id)
    {   
        $iglesia = Iglesia::findOrFail($id);
        return view('iglesia.edit',compact('iglesia'));
    }

    public function update(UpdateIglesia $request)
    {       
        $iglesia = Iglesia::findOrFail($request->id);
        $iglesia->update($request->all());
        return redirect(route('iglesia.index'));
    }

    public function destroy($id)
    {
        $iglesia = Iglesia::findOrFail($id);
        $iglesia->delete();
        return redirect()->route('iglesia.index');
    }
}