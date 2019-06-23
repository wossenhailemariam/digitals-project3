<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;
use App\Company;
use App\TaskUser;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TasksRequest;
use App\Events\AddUserToTaskEvent;

class TasksController extends Controller
{

     public function index()
     {
        //CLEANED UP: USED SCOPE for user-id
        $tasks = Task::FilterUser()->get();
        return view('tasks.index', ['tasks'=> $tasks]);
     }


     public function adduser(TasksRequest $request){
         //Add Users to Tasks

         //Take a Task, add a User to it
         $task = Task::find($request->input('task_id'));

        //CLEANED UP: USED EVENT
        //FIRE EVENT
        event(new AddUserToTaskEvent($task,$request));
         return redirect()->route('tasks.show', ['task'=> $task->id])
         ->with('errors' ,  'Error adding user to task');
     }



     public function create( $task_id = null )
     {
         $tasks = null;
         if(!$task_id){
            //CLEANED UP: USED SCOPE for user-id
            $tasks = Project::FilterUser()->get();
         }

         return view('tasks.create',['task_id'=>$task_id, 'projects'=>$tasks]);
     }


     public function store(TasksRequest $request)
     {
        //CLEANED UP: USED OBSERVERS
        $task = Task::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'project_id' => $request->input('project_id'),
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('projects.show', ['task'=> $task->id])
        ->with('success' , 'task created successfully');
     }


     public function show(Task $task, Company $company, Project $project)
     {
        //CLEANED UP: ROUTE MODEL BINDING -- automatical injection
        $comments = $task->comments;
         return view('tasks.show', ['task'=>$task, 'comments'=> $comments,'project'=>$project,'company'=>$company ]);
     }


     public function edit(Task $task)
     {

        //CLEANED UP: ROUTE MODEL BINDING -- automatical injection
         return view('tasks.edit', ['task'=>$task]);
     }


     public function update(TasksRequest $request, task $task)
     {
        //CLEANED UP: USED OBSERVERS
        Task::where('id', $task->id)
                        ->update([
                                'name'=> $request->input('name'),
                                'description'=> $request->input('description')
                        ]);


        return redirect()->route('tasks.show', ['task'=> $task->id])
        ->with('success' , 'task updated successfully');
     }


     public function destroy(Task $task)
     {
        //CLEANED UP: ROUTE MODEL BINDING -- automatical injection
        //CLEANED UP: USED OBSERVERS
         if($task->delete()){
             return redirect()->route('tasks.index')
             ->with('success' , 'task deleted successfully');
         }
     }
}
