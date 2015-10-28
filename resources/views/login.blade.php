@extends('layouts.private')

@section('title')
	Login
@stop

@section('content')

 

        @if(Session::get('errors'))
          <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5>There were errors during login:</h5>
    @foreach($errors->all('<li>:message</li>') as $message)
      {!!$message!!}
    @endforeach
  </div>
@endif


 	{!!Form::open(array('url' => 'login'))!!}
      
        <h2 class="form-signin-heading">Please sign in</h2>

        <p>
		{!!Form::text('username', null, array('class' => 'form-control' , 'placeholder' => 'Username'))!!}
		</p>
       

        <p>
        {!! Form::password('password', array('class'=>'form-control ','placeholder'=>'Password')) !!}

      

        </p>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me

          </label>
        </div>

      

         
      
       
	
	
		
		{!!Form::submit('Sign in' , array('class' => 'btn btn-lg btn-primary btn-block'))!!}
	{!!Form::close()!!}

	   <a href="users/create">Create Account</a>

@stop