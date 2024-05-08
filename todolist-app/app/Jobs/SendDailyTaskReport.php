<?php

namespace App\Jobs;

use App\Models\Tarea;
use App\Exports\TaskExport;

use App\Mail\DailyTaskReport;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Queue\SerializesModels;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendDailyTaskReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {
        //
    }

    public function handle(): void
    {
        $tasks = Tarea::query()
            ->where('estado', Tarea::COMPLETED)
            //ayer
            //->whereDate('updated_at', today()->subDay())
            //hoy
            ->whereDate('updated_at', today())
            ->with('user:id,name,email')
            ->get(['tarea', 'descripcion', 'urgencia', 'user_id']);

        //nombre de el archivo
        $fileName = 'daily_task_report_' . today()->format('Ymd') . '.xlsx';

        $tasksFormated = $tasks
            ->map(function (Tarea $task) {
                return [
                    'tarea' => $task->tarea,
                    'descripcion' => $task->descripcion,
                    'urgencia' => $task->urgencia_name,
                    'name' => $task->user->name,
                    'email' => $task->user->email,
                ];
            })
            ->values();

        Excel::store(new TaskExport($tasksFormated), $fileName);

        $excelFilePath = storage_path('app/' . $fileName);

        // Enviar el correo electrónico con el archivo adjunto
        $email = 'admin@example.com';
        Mail::to($email)->send(new DailyTaskReport($excelFilePath));

        // Borrando archivo
        unlink($excelFilePath);

        // dispatch(new SendDailyTaskReport());
    }
}
