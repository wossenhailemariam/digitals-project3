<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Http\Requests\ProjectsRequest;


class AddUserToTaskEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $task;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($task, ProjectsRequest $request)
    {

        $this->task = $task;
        //single record
        $user = User::where('email', $request->input('email'))->first();
             //Check if User is already Added to the Project
        ProjectUser::where('user_id',$user->id)
            ->where('project_id',$task->id)
            ->first();

    }


}
