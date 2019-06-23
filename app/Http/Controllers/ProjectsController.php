<?php

namespace App\Http\Controllers;

use App\Project;
use App\Company;
use App\ProjectUser;
use App\User;
use App\Http\Requests\ProjectsRequest;

use Illuminate\Support\Facades\Auth;
use App\Events\AddUserToProjectEvent;

class ProjectsController extends Controller
{

    public function index()
    {

        //CLEANED UP: USED SCOPE for user-id
        $projects = Project::FilterUser()->get();
        return view('projects.index', ['projects'=> $projects]);

    }


    public function adduser(ProjectsRequest $request){
        //Add Users to the Project
        //First Take a Project, and  Add a User on to it
        $project = Project::find($request->input('project_id'));
        //CLEANED UP: USED EVENT
        //FIRE EVENT
        event(new AddUserToProjectEvent($project,$request));
        return redirect()->route('projects.show', ['project'=> $project->id])
        ->with('errors' ,  'Error adding user to project');
    }


    public function create( $company_id = null )
     {
         $companies = null;
         if(!$company_id){
            $companies = Company::FilterUser()->get();
         }
         return view('projects.create',['company_id'=>$company_id, 'companies'=>$companies]);
     }


     public function store(ProjectsRequest $request)
     {
        //CLEANED UP: USED OBSERVERS
        $project = Project::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'company_id' => $request->input('company_id'),
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('projects.show', ['project'=> $project->id])
        ->with('success' , 'project created successfully');
     }


     public function show(Project $project)
     {
        //CLEANED UP: ROUTE MODEL BINDING -- automatical injection
        $comments = $project->comments;
         return view('projects.show', ['project'=>$project,'comments'=> $comments ]);
     }

     public function edit(Project $project)
     {
        //CLEANED UP: ROUTE MODEL BINDING -- automatical injection
         return view('projects.edit', ['project'=>$project]);
     }


     public function update(ProjectsRequest $request, project $project)
     {
        //CLEANED UP: USED OBSERVER
        Project::where('id', $project->id)
                            ->update([
                                    'name'=> $request->input('name'),
                                    'description'=> $request->input('description')
                            ]);


        return redirect()->route('projects.show', ['project'=> $project->id])
        ->with('success' , 'project updated successfully');
     }


     public function destroy(Project $project)
     {

      //CLEANED UP: ROUTE MODEL BINDING -- automatical injection
        //CLEANED UP: USED OBSERVER
         if($project->delete()){
             return redirect()->route('projects.index')
             ->with('success' , 'project Deleted Successfully');
         }
     }
}
