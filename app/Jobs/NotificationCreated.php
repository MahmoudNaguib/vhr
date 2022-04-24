<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NotificationCreated implements ShouldQueue {

    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $row;

    public function __construct($row) {
        $this->row = $row;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        if (app()->environment() != 'testing' && !app()->runningInConsole()) {
            if ($row = $this->row) {
                if ($row->send_email) {
                    \App\Jobs\NotificationSendEmail::dispatch($row);
                }
                if ($row->send_push) {
                    \App\Jobs\SendPushNotification::dispatch($row->user_id, $row->title, $row->content, ['id' => $row->entity_id, 'type' => $row->type]);
                }
            }
        }
    }

}
