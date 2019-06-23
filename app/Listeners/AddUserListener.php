<?php

namespace App\Listeners;

use App\Events\AddUserToProjectEvent;
use App\Events\AddUserToTaskEvent;


class AddUserListener
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
     * @param  AddUserToProjectEvent  $event     *
     * @param  AddUserToTaskEvent  $event
     * @return void
     */
    public function handle(AddUserToTaskEvent $taskevent, AddUserToProjectEvent $projectevent)
    {

        if($projectevent->user && $projectevent->project){
            $projectevent->project->users()->attach($projectevent->user->id);
                    return response()->json(['success' ,  $projectevent->request->input('email').' was added to the project successfully']);
            }

        if($taskevent->user && $taskevent->task){
            $taskevent->task->users()->attach($taskevent->user->id);
            return response()->json(['success' ,  $taskevent->request->input('email').' was added to the task successfully']);
        }

    }
}
