@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        @include('includes.messages')
        <form method="POST" action="/projects" enctype="multipart/form-data">
          @csrf
          <div class="form-group" >
            <label for="exampleInputEmail1">Project Name : </label>
            <input type="name" name="name" class="form-control" id="exampleInputEmail1">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Project Desc : </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc"></textarea>
          </div>
          <div class="form-group">
            <input type="file" name="coverImage" id="coverImage" class="form-control-file">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>          
    </div>
</div>

@endsection