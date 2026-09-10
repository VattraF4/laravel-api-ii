<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\NewPostNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmailsJob implements ShouldQueue
{
    use Queueable;
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $userIds;
    public $post;
    public function __construct($userIds, $post)
    {
        $this->userIds = $userIds;
        $this->post = $post;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // User::whereIn('id',$this->userIds)->each(function ($user) {
        //     $user->notify(new \App\Notifications\NewPostNotification());
        // });

        User::whereIn('id',$this->userIds)->get();
        foreach ($this->userIds as $userId) {
            $user = User::find($userId);
            if ($user) {
                $user->notify(new NewPostNotification($this->post));
            }
        }
    }
}
