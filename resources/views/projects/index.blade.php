@extends('layouts.master')
@section('title')
    <h1 style="text-align: center">List All Projects Here</h1>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                @include('includes.messages')
                @foreach ($projects as $project)
                    <div class="col-md-4">
                        <div class="card card-success" style="margin-bottom: 20px">
                        <img src="{{asset('storage/coverImages/' . $project->image)}}" class="card-img-top" alt="...">
                            <div class="card-body">
                            {{$project->name}}
                            </div>
                        <div class="card-footer">
                            {{$project->desc}} 
                        </div>
                        <div class="card-footer text-muted">
                            {{$project->created_at}}
                          </div>
                          <div class="card-footer text-muted">
                              Posted By : {{$project->user->name}}
                              <a href="{{'/projects/' . $project->id}}" class="btn btn-primary" style="display:block;margin-top:12px">Show More</a>

                          </div>

                        </div>
                    </div>                
                @endforeach
            </div>
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-success">
                        <div class="card-body"  style="background: #3c763d">
                        States
                        </div>
                        <div class="card-footer">{{$count}}</div>
                    </div>
    
                </div>

            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                {{$projects->links()}}
            </div>
        </div>
    </div>
</div>
@endsection



