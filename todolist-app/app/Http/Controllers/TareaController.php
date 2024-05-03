<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tarea;

//Libreria para crear PDF
//use Barryvdh\DomPDF\Facade\Pdf as PDF;

use App\Http\Requests\TareaRequest;

use App\Http\Resources\TareaResource;
use App\Notifications\TaskNotification;
use Illuminate\Support\Facades\Notification;

class TareaController extends Controller
{
    public function index()
    {
        //Autentificación de usuario
        $usuario = User::where('id', auth()->id())->get();

        //verificaciones de si es usuario o no para mostrar todos o solo sus tareas
        if ($usuario[0]->role == 'admin') {
            $tareas = Tarea::all();
            return view('tareas.index', ['tareas' => TareaResource::collection($tareas), 'usuario' => $usuario]);
        } else {
            $tareas = Tarea::where('user_id', auth()->id())->get();
            return view('tareas.index', ['tareas' => TareaResource::collection($tareas), 'usuario' => $usuario]);
        }
    }

    public function create()
    {
        //creación de una tarea nueva
        return view('tareas.create', [
            'priorities' => Tarea::getPriorities(),
            'statuses' => Tarea::getStatuses(),
        ]);
    }

    public function store(TareaRequest $request)
    {
        //validando tarea
        $requestValid = $request->validated();
        $requestValid['user_id'] = auth()->id();
        //creando tarea
        Tarea::create($requestValid);

        return redirect(route('tareas.index'));
    }

    public function edit(Tarea $tarea)
    {
        //trayendo tarea a modificar y mostrandola en vista para editarla
        return view('tareas.edit', [
            'tarea' => $tarea,
            'priorities' => Tarea::getPriorities(),
            'statuses' => Tarea::getStatuses(),
        ]);
    }

    public function update(Tarea $tarea, TareaRequest $request)
    {
        //validando tarea
        $tarea->update($request->validated());

        //validando si la tarea esta o no guardandose como completada para envío de correo
        if ($tarea->estado == 3) {
            //Encontrando nombre de usuario
            $user = User::find($tarea->user_id);

            //$userName = $user->name;

            //la tarea que se realiza
            //$tareaMail = $tarea->tarea;

            //el correo del Admin
            $admin = User::where('role', 'admin')->first();

            //manda notificación/email
            $notification = new TaskNotification($user, $tarea);
            Notification::send($admin, $notification);
            /*
            Mail::send(
                'mail.email',
                [
                    'name' => $userName,
                    'tarea' => $tareaMail,
                ],
                function ($message) use ($adminMail, $pdf) {
                    $message->to($adminMail)->subject('Notificación de Tarea Completada')->attachData($pdf->output(), 'archivo.pdf');
                },
            );
            */
        }
        //mensaje de éxito
        return redirect(route('tareas.index'))->with('success', 'La tarea se ha actualizado correctamente');
    }

    public function destroy(Tarea $tarea)
    {
        //eliminando tarea
        $tarea->delete();
        //mensaje de éxito
        return redirect(route('tareas.index'))->with('success', 'La tarea se ha borrado correctamente');
    }
}
