<?php

namespace App\Notifications;

use App\Models\Tarea;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use Barryvdh\DomPDF\Facade\Pdf as PDF;

class TaskNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $user, $tarea;

    /**
     * Create a new notification instance.
     */

    public function __construct(User $user, Tarea $tarea)
    {
        $this->user = $user;
        $this->tarea = $tarea;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {

        //ruta de img
        $imagenPath = public_path('storage\img\approval.png');
        //creación de pdf
        $pdf = PDF::loadView('mail.pdf', [
            'name' => $this->user->name,
            'tarea' => $this->tarea->tarea,
            'imagenUrl' => $imagenPath,
        ]);

        //convertir pdf a string
        $pdfContent = $pdf->output();

        return (new MailMessage())
            ->view('mail.email', [
                'name' => $this->user->name,
                'tarea' => $this->tarea->tarea
            ])
            ->subject('Notificación de Tarea Completada')
            ->attachData($pdfContent , 'archivo.pdf');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
                //
            ];
    }
}
