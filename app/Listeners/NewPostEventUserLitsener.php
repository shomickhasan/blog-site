<?php

namespace App\Listeners;

use App\Events\NewPostEventAllUserNotify;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\userInfo;
use App\Mail\PostCreatedMailUser;

class NewPostEventUserLitsener
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
     * @param  \App\Events\NewPostEventAllUserNotify  $event
     * @return void
     */
    public function handle(NewPostEventAllUserNotify $event)
    {
       $users = userInfo::get();
       foreach($users as $user){
            if($user->status != 1){
                \Mail::to($user->email)->send(new PostCreatedMailUser($event->data , $user->name));
            }
       }
    }
}
