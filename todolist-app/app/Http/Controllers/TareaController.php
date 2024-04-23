<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tarea;
use App\Http\Requests\TareaRequest;
use App\Http\Resources\TareaResource;

class TareaController extends Controller
{
    public function index()
    {
        $usuario = User::where('id', auth()->id())->get();

        if ($usuario[0]->role == 'admin') {
            $tareas = Tarea::all();
            $usuarios = User::all();
            return view('tareas.index', ['tareas' => TareaResource::collection($tareas), 'usuario' => $usuario, 'usuarios' => $usuarios]);
        } else {
            $tareas = Tarea::where('user_id', auth()->id())->get();
            $usuarios = User::all();
            return view('tareas.index', ['tareas' => TareaResource::collection($tareas), 'usuario' => $usuario, 'usuarios' => $usuarios]);
        }
    }

    public function create()
    {
        return view('tareas.create', [
            'priorities' => Tarea::getPriorities(),
            'statuses' => Tarea::getStatuses(),
        ]);
    }

    public function store(TareaRequest $request)
    {
        $requestValid = $request->validated();
        $requestValid['user_id'] = auth()->id();

        Tarea::create($requestValid);

        return redirect(route('tareas.index'));
    }

    public function edit(Tarea $tarea)
    {
        return view('tareas.edit', [
            'tarea' => $tarea,
            'priorities' => Tarea::getPriorities(),
            'statuses' => Tarea::getStatuses(),
        ]);
    }

    public function update(Tarea $tarea, TareaRequest $request)
    {
        $tarea->update($request->validated());

        return redirect(route('tareas.index'))->with('success', 'La tarea se ha actualizado correctamente');
    }

    public function destroy(Tarea $tarea)
    {
        $tarea->delete();

        return redirect(route('tareas.index'))->with('success', 'La tarea se ha borrado correctamente');
    }
}
