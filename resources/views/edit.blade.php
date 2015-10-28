@extends('layouts.master')

@section('title')
	Edit profile
@stop

@section('content')
	@foreach($errors->all() as $error)
		<p>{!!$error!!}</p>
	@endforeach
	{!!Form::open(array('url' => 'users/'.$id , 'method' => 'PUT'))!!}
		<p>
		{!!Form::label('username','New Username')!!}
		{!!Form::text('username')!!}
		</p>
		<p>
		{!!Form::label('password', 'New Password')!!}
		{!!Form::password('password')!!}
		</p>
		<p>
		{!!Form::label('password-repeat', 'Password-Repeat')!!}
		{!!Form::password('password-repeat')!!}
		</p>
		<p>
		{!!Form::label('email','New Email')!!}
		{!!Form::email('email')!!}
		</p>
		<p>
		{!!Form::label('male')!!}
		{!!Form::radio('sex', 'male',true)!!}
		{!!Form::label('female')!!}
		{!!Form::radio('sex', 'female')!!}
		</p>
		<p>
		{!!Form::label('year', 'New Year')!!}
		{!!Form::selectRange('year',1980, date("Y"))!!}
		</p>
		{!!Form::submit('Update')!!}
	{!!Form::close()!!}

	{!!Form::open(array('url' =>'users/'.$id , 'method' => 'DELETE'))!!}
		{!!Form::submit('Delete profile')!!}
	{!!Form::close()!!}
@stop