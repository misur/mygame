@extends('layouts.test')

@section('title')
 About
@stop


@section('content')

     <div ng-app="">
 
<p>Input something in the input box:</p>
<p>Name : <input type="text" ng-model="name" placeholder="Enter name here"></p>


</div>
@stop
