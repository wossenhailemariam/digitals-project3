@extends('layouts.app')

@section('content')



     <div class=" col-md-9 col-lg-9 col-sm-9 pull-left " style="background: white; ">
        <h1>Create new Task </h1>

      <!-- Example row of columns -->
      <div class="row  col-md-12 col-lg-12 col-sm-12">

      <form method="post" action="{{ route('tasks.store') }}">
                            {{ csrf_field() }}


                            <div class="form-group">
                                <label for="task-name">Name<span class="required">*</span></label>
                                <input   placeholder="Enter name"
                                          id="task-name"
                                          required
                                          name="name"
                                          spellcheck="false"
                                          class="form-control"
                                           />
                                  </div>
                                  <div class="form-group">
                                        <label for="task-content">Description</label>
                                        <textarea placeholder="Enter description"
                                                  style="resize: vertical"
                                                  id="task-content"
                                                  name="description"
                                                  rows="5" spellcheck="false"
                                                  class="form-control autosize-target text-left">


                                                  </textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary"
                                               value="Create"/>
                                    </div>

                            @if($projects == null)
                            <input
                            class="form-control"
                            type="hidden"
                                    name="project_id"
                                    value="{{ $project_id }}"
                                    />
                            </div>

                            @endif

                            @if($projects != null)
                            <div class="form-group">
                                <label for="project-content">Select Project</label>

                                <select name="project_id" class="form-control" >

                                @foreach($projects as $project)
                                        <option value="{{ $project->id}}"> {{ $project->name}} </option>
                                      @endforeach
                                </select>
                            </div>
                            @endif


                        </form>


        </div>
    </div>


<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
          <!--<div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div> -->
          <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
              <li><a href="/digitals-project3/public/tasks"><i class="fa fa-user-o" aria-hidden="true"></i> My Tasks</a></li>

            </ol>
          </div>

          <!--<div class="sidebar-module">
            <h4>Members</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
            </ol>
          </div> -->
        </div>
    </div>

    @endsection
