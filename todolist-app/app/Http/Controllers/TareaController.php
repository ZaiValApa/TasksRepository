<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tarea;

use Barryvdh\DomPDF\Facade\Pdf as PDF;

use App\Http\Requests\TareaRequest;

use App\Http\Resources\TareaResource;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class TareaController extends Controller
{
    public function index()
    {
        $usuario = User::where('id', auth()->id())->get();

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

        if ($tarea->estado == 3) {
            $user = User::find($tarea->user_id);
            $userName = $user->name;

            $tareaMail = $tarea->tarea;

            $admin = User::where('role', 'admin')->first();
            $adminMail = $admin->email;
            /*/
        $pdf = PDF::loadView('mail.pdf', [
            'name' => $userName,
            'tarea' => $tareaMail,
        ]);

        Mail::send('mail.email', [
            'name' => $userName,
            'tarea' => $tareaMail,
        ], function ($message) use ($adminMail, $pdf) {
            $message->to($adminMail)
                    ->subject('Notificación de Tarea Completada')
                    ->from($adminMail)
                    ->attachData($pdf->output(), 'archivo.pdf');
        });
        */

            $imagenPath = public_path('storage\img\approval.png');
            $imagenData = file_get_contents($imagenPath);

            $pdf = PDF::loadView('mail.pdf', [
                'name' => $userName,
                'tarea' => $tareaMail,
                'imagenUrl' => $imagenPath,
            ]);

            Mail::send(
                'mail.email',
                [
                    'name' => $userName,
                    'tarea' => $tareaMail,
                ],
                function ($message) use ($adminMail, $pdf, $imagenData) {
                    $message->to($adminMail)->subject('Notificación de Tarea Completada')->attachData($pdf->output(), 'archivo.pdf');
                },
            );
        }
        return redirect(route('tareas.index'))->with('success', 'La tarea se ha actualizado correctamente');
    }

    public function destroy(Tarea $tarea)
    {
        $tarea->delete();

        return redirect(route('tareas.index'))->with('success', 'La tarea se ha borrado correctamente');
    }
}
