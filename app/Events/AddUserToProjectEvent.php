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


class AddUserToProjectEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $project;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($project,ProjectsRequest $request)
    {

        $this->project = $project;
        //single record
        $user = User::where('email', $request->input('email'))->first();
             //Check if User is already Added to the Project
        $projectUser = ProjectUser::where('user_id',$user->id)
            ->where('project_id',$project->id)
            ->first();
    }

}
