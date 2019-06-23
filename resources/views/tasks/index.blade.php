@extends('layouts.app')

@section('content')

<div class="row col-md-12 col-lg-12 col-md-12  col-lg-12">
    <div class="panel panel-primary ">
    <div class="panel-heading">Tasks <a  class="pull-right btn btn-primary btn-sm" href="/digitals-project3/public/tasks/create">
    <i class="fa fa-plus-square" aria-hidden="true"></i>  Create new</a> </div>
    <div class="panel-body">

    <br>
    <ul class="list-group">
    @foreach($tasks as $task)
        <li class="list-group-item">
        <i class="fa fa-play" aria-hidden="true"></i> <a href="/digitals-project3/public/tasks/{{ $task->id }}" >  {{ $task->name }}</a></li>
        <br>
    @endforeach
    </ul>


    </div>
    </div>
</div>

@endsection
