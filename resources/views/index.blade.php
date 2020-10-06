@extends('layouts.master')
@section('title')
    <h1>This is Title</h1>
@endsection
@section('content')
    <p>This is Content</p>
<p>{{$title}}</p>
@if (count($services) > 0)
    @foreach ($services as $service)
    <li>{{$service}}</li>
    @endforeach
@endif
@endsection



