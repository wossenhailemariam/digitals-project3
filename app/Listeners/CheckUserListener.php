<?php

namespace App\Listeners;

use App\Events\AddUserToProjectEvent;
use App\Events\AddUserToTaskEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CheckUserListener
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
     *t
     * @param  AddUserToProjectEvent  $event
     * @param  AddUserToTaskEvent  $event
     * @return void
     */
    public function handle(AddUserToTaskEvent $taskevent, AddUserToProjectEvent $projectevent)
    {
        if($projectevent->projectUser){
            //if user already exists, exit
            return response()->json(['success' ,  $projectevent->request->input('email').' is already a member of this project']);
        }
        if($taskevent->taskUser){
            //if user already exists, exit
            return response()->json(['success' ,  $taskevent->request->input('email').' is already a member of this task']);
        }
    }
}
