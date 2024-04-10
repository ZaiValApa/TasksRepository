<?php

namespace App\Http\Controllers;
use App\Models\Tarea;
use Illuminate\Http\Request;
use App\Http\Requests\TareaRequest;
use App\Http\Resources\TareaResource;


class TareaController extends Controller
{
    public function index()
    {
        $tareas = Tarea::all();

        return view('tareas.index', ['tareas' => TareaResource::collection($tareas)]);
    }

    public function create()
    {
        return view('tareas.create',[
            'priorities' => Tarea::getPriorities(),
            'statuses' => Tarea::getStatuses(),
        ]);
    }

    public function store(TareaRequest $request)
    {

        Tarea::create($request->validated());

        return redirect(route('tarea.index'));
    }

    public function edit(Tarea $tarea)
    {
        return view('tareas.edit',[
            'tarea' => $tarea,
            'priorities' => Tarea::getPriorities(),
            'statuses' => Tarea::getStatuses(),
        ] );
    }

    public function update(Tarea $tarea, TareaRequest $request)
    {

        $tarea->update($request->validated());

        return redirect(route('tarea.index'))->with('success', 'La tarea se ha actualizado correctamente');
    }

    public function destroy(Tarea $tarea)
    {
        $tarea->delete();

        return redirect(route('tarea.index'))->with('success', 'La tarea se ha borrado correctamente');
    }
}
