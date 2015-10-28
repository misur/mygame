@extends('layouts.private')

@section('title')
	Join us
@stop

@section('content')
	 @if(Session::get('errors'))
          <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5>There were errors during registration:</h5>
    @foreach($errors->all('<li>:message</li>') as $message)
      {!!$message!!}
    @endforeach
  </div>
@endif


	<h2 class="form-signin-heading">Create Account</h2>


	{!!Form::open(array('url' => 'users'))!!}
		<p>
		
		{!!Form::text('username', null, array('class' => 'form-control' , 'placeholder' => 'Username'))!!}
		</p>
		<p>
		
		{!!Form::password('password', array('class'=>'form-control ','placeholder'=>'Password'))!!}
		</p>
		<p>
	
		{!!Form::password('password-repeat', array('class'=>'form-control ','placeholder'=>'Password - Repeat'))!!}
		</p>
		<p>
		
		{!!Form::email('email', null, array('class' => 'form-control' , 'placeholder' => 'Email'))!!}
		</p>
		<p>
		{!!Form::label('male')!!}
		{!!Form::radio('sex', 'male',true)!!}
		{!!Form::label('female')!!}
		{!!Form::radio('sex', 'female')!!}
		</p>
		<p>
		{!!Form::label('year')!!}
		{!!Form::selectRange('year',1980, date("Y"))!!}
		</p>
		{!!Form::submit('Create' , array('class' => 'btn btn-lg btn-primary btn-block'))!!}
		<a href="login" type="button" class="btn btn-lg btn-primary btn-block"  >Sign in</a>
	{!!Form::close()!!}
@stop