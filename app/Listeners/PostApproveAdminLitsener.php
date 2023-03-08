<?php

namespace App\Listeners;

use App\Events\PostCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\userInfo;
use App\Mail\AdminPostApprove;
use Illuminate\Support\Facades\Mail;

class PostApproveAdminLitsener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PostCreatedEvent  $event
     * @return void
     */
    public function handle(PostCreatedEvent $event)
    {
        $user = userInfo::get();
        foreach($user as $admin){
            if($admin->status==1){
                $adminemail =$admin->email;
                \Mail::to($adminemail)->send(new AdminPostApprove($event->post));
            }
        }

    }
}
