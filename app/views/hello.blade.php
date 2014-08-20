@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
{{trans('pages.helloworld')}}
@stop

{{-- Content --}}
@section('content')

<div class="jumbotron">
  <div class="container">
    <h1>Hello World!</h1>
    <p>this is a Laravel bootstraper starter site.</p>
  </div>
</div>

@stop
