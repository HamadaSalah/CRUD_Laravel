@extends('layouts.master')
@section('title')
<h1 style="text-align: center"> Project Id {{$project->id}}</h1>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-body"  style="background: #337ab7">
                <img src="{{asset('storage/coverImages/'. $project->image)}}" class="card-img-top" alt="">
                {{$project->name}}
                </div>
                <div class="card-footer">{{$project->desc}}
                    <hr/>
                    <p class="text-muted">{{$project->created_at}}</p>
                    @auth
                        @if (auth()->user()->id == $project->user_id)
                            <hr/>
                            <a href="{{'/projects/'. $project->id . '/edit'}}" class="btn btn-success">Edit</a>
                            <form method="POST" action="{{ route('projects.delete', ['id'=>$project->id]) }}" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                            </form>
                        @endif
                    @endauth
                    <div class="card-footer text-muted">
                        Posted By : {{$project->user->name}}
                    </div>

                </div>
            </div>                

        </div>
    </div>
</div>
@endsection



