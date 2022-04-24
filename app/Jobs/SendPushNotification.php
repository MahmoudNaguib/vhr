<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

class SendPushNotification implements ShouldQueue {

    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $user_id;
    public $title;
    public $body;
    public $data;

    public function __construct($userId, $title, $body, $data = NULL) {
        $this->user_id = $userId;
        $this->title = $title;
        $this->body = $body;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        if (app()->environment() != 'testing' && !app()->runningInConsole()) {
            $user = \App\Models\User::active()->where('id', $this->user_id)->first();
            $tokens = \App\Models\PushToken::where('created_by', $user->id)->where('push_token', '!=', NULL)->pluck('push_token')->toArray();
            if ($tokens) {
                foreach ($tokens as $token) {
                    sendPushNotifications($tokens, $this->title, $this->body, $this->data);
                }
            }
        }
    }

}
