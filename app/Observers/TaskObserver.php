<?php

namespace App\Observers;

use App\Task;

class TaskObserver
{
    /**
     * Handle the task "created" event.
     *
     * @param  \App\Task  $task
     * @return void
     */
    public function creating(Task $task)
    {
        if(!$task){
            return back()->withInput()->with('errors', 'Error creating new Task');
        }
    }

    /**
     * Handle the task "updated" event.
     *
     * @param  \App\Task  $task
     * @return void
     */
    public function updating(Task $task)
    {
        if(!$task){
            return back()->withInput()->with('errors', 'Error Updating the Task');
        }

    }

    /**
     * Handle the task "deleted" event.
     *
     * @param  \App\Task  $task
     * @return void
     */
    public function deleting(Task $task)
    {
        if($task){
            return redirect()->route('tasks.index')
            ->with('error' , 'Task could not be Deleted');
        }
    }


}
