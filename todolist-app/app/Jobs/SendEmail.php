<?php

namespace App\Jobs;

use App\Notifications\TaskNotification;
use Illuminate\Support\Facades\Schedule;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //$taskNotification = TaskNotification::where('send_time','<=', now())->whereNull('started_at')->get();

        //$taskNotification->each(fn($newsletter)=>Se)
    }
}
