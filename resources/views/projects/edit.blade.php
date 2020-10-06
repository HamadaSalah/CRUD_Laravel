@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
      <h1> Edit Project ID {{$project->id}}</h1>
        @include('includes.messages')
        <form method="POST" action="{{'/projects/' . $project->id }}">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="exampleInputEmail1">Project Name : </label>
          <input type="name" name="name" class="form-control" id="exampleInputEmail1" value="{{$project->name}}">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Project Desc : </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc">{{$project->desc}}</textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>          
    </div>
</div>

@endsection