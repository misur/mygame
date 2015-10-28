@extends('layouts.master')

@section('title')
	Users
@stop


@section('content')
	
	<h2>All users:</h2>
	<table class="table table-condensed">
		<thead>
		<tr>
			<th>Username</th>
			<th>Email</th>
			<th>Sex</th>
			<th>Year</th>
			<th>Type</th>
			<th>Profile</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		</thead>
		@foreach($users as $user)
			@if($user->type == 'admin')
				<tr class='danger'>
					<td>{!!$user->username!!}</td>
					<td>{!!$user->email!!}</td>
					<td>{!!$user->sex!!}</td>
					<td>{!!$user->year!!}</td>
					<td>{!!$user->type!!}</td>
					<td>
						
						<?php
							echo
							'<a href="users/'.$user->id .'">
								<span class="glyphicon glyphicon-user"></span>
							</a>'
						?>
					</td>
					<td>
						
						<?php
							echo
							'<a href="users/'.$user->id .'/edit">
								<span class="glyphicon glyphicon-cog"></span>
							</a>'
						?>
					</td>
					<td>
						
						<?php
							echo
							'<a href="users/'.$user->id .'">
								<span class="glyphicon glyphicon-remove"></span>
							</a>'
						?>
					</td>

				<tr>
			@else
				<tr class='active'>
					<td>{!!$user->username!!}</td>
					<td>{!!$user->email!!}</td>
					<td>{!!$user->sex!!}</td>
					<td>{!!$user->year!!}</td>
					<td>{!!$user->type!!}</td>
					<td>
						
						<?php
							echo
							'<a href="users/'.$user->id .'">
								<span class="glyphicon glyphicon-user"></span>
							</a>'
						?>
					</td>
					<td>
						
						<?php
							echo
							'<a href="users/'.$user->id .'/edit">
								<span class="glyphicon glyphicon-cog"></span>
							</a>'
						?>
					</td>
					<td>
						{{-- Delete not working --}}
						<?php
							echo
							'<a href="users/'.$user->id .'">
								<span class="glyphicon glyphicon-remove"></span>
							</a>'
						?>
					</td>
				<tr>
			@endif
		@endforeach
	</table>
	
@stop

@section('navbar')

<ul class="nav nav-pills nav-stacked">
    <li role="presentation" ><a href="/mygame/public">Home</a></li>
    <li role="presentation" class="active"><a href="users">Users</a></li>
    <li role="presentation"><a href="words">Words</a></li>
    <li role="presentation"><a href="mywords">My Words</a></li>
  </ul>

@stop