@extends('layouts.master')

@section('title')
	Profile
@stop


@section('content')
	<p>
		<h3> Username: </h3> {!!$user->username!!}
	</p>
	<p>
		<h3> Email: </h3> {!!$user->email!!}
	</p>
	<p>
		<h3> Sex: </h3> {!!$user->sex!!}
	</p>
	<p>
		<h3> Year: </h3> {!!$user->year!!}
	</p>
	<p>
		<h3> Type: </h3> {!!$user->type!!}
	</p>

	{!! Html::link('users/'.$user->id.'/edit' , 'Edit profile')!!}
@stop