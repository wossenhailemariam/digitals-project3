<?php

namespace App\Observers;

use App\Project;

class ProjectObserver
{
    /**
     * Handle the project "created" event.
     *
     * @param  \App\Project  $project
     * @return void
     */
    public function creating(Project $project)
    {
        if(!$project){
            return back()->withInput()->with('errors', 'Error creating new Project');
        }
    }

    /**
     * Handle the project "updated" event.
     *
     * @param  \App\Project  $project
     * @return void
     */
    public function updating(Project $project)
    {
        if(!$project){
            return back()->withInput()->with('errors', 'Error Updating the Project');
        }

    }

    /**
     * Handle the project "deleted" event.
     *
     * @param  \App\Project  $project
     * @return void
     */
    public function deleting(Project $project)
    {
        if($project){
            return redirect()->route('projects.index')
            ->with('error' , 'Project could not be Deleted');
        }
    }



}
