<?php

namespace App\Http\Controllers;
use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function index(){
        $tareas = Tarea::all();
        return view('tareas.index',['tareas' => $tareas]);
    }

    public function create(){
        return view('tareas.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'tarea' => 'required',
            'descripcion' => 'nullable',
            'estado' => 'required',
            'urgencia' =>'required'
        ]);
    
        $newTarea = Tarea::create($data);

        return redirect(route('tarea.index'));
        
    }

    public function edit(Tarea $tarea){
        return view('tareas.edit', ['tarea'=>$tarea]);
    }

    public function update(Tarea $tarea, Request $request){
        $data = $request->validate([
            'tarea' => 'required',
            'descripcion' => 'nullable',
            'estado' => 'required',
            'urgencia' =>'required'
        ]);

        $tarea->update($data);

        return redirect(route('tarea.index'))->with('success', 'La tarea se ha actualizado correctamente');

    }

    public function destroy(Tarea $tarea){
        $tarea->delete();
        return redirect(route('tarea.index'))->with('success', 'La tarea se ha borrado correctamente');
    }

}
