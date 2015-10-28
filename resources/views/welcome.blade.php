@extends('layouts.master')

@section('title')
 Home
@stop


@section('content')
 <h2>Home page</h2>
<div class="jumbotron">
    <h1>My first Bootstrap website!</h1>      
    <p>This page will grow as we add more and more components from Bootstrap...</p>      
    <a href="#" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-search"></span> Search</a>
  </div>
      
@stop

@section('navbar')

<ul class="nav nav-pills nav-stacked">
    <li role="presentation" class="active"><a href="/mygame/public">Home</a></li>
    <li role="presentation"><a href="users">Users</a></li>
    <li role="presentation"><a href="words">Words</a></li>
    <li role="presentation"><a href="mywords">My Words</a></li>
  </ul>

@stop
