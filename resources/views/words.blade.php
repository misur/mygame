@extends('layouts.master')

@section('title')
	Words
@stop


@section('content')
	
	<h2>All words: </h2>

	<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Add word</a>
	<br>
	<br>
		<div class="row">
		   <div class="col-lg-4">
		    @if(Session::get('errors'))
        	  <div class="alert alert-danger alert-dismissable">
     		 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
   			 <h5>There were errors during registration:</h5>
  			  @foreach($errors->all('<li>:message</li>') as $message)
     		 {!!$message!!}
  			  @endforeach
 			 </div>
			@endif
			<div class="collapse" id="collapseExample" >
			{!!Form::open(array('url' => 'words'))!!}
				<p>
				
				{!!Form::select('type', array('choose' => 'Choose', 'word' => 'Word', 'phrase' => 'Phrase'), 'choose')!!}
				</p>
				<p>
				
				{!!Form::text('text',null, array('class'=>'form-control ','placeholder'=>'Text'))!!}
				</p>
				<p>
			
				{!!Form::text('translation',null, array('class'=>'form-control ','placeholder'=>'Translation'))!!}
				</p>
				
				</p>
				{!!Form::submit('Create' , array('class' => 'btn btn-lg btn-primary btn-block'))!!}
				
			{!!Form::close()!!}
		  	
			</div>

			</div>
			</div>

			<table class="table table-condensed">
		<thead>
		<tr>
			<th>Text</th>
			<th>Translate</th>
			<th>Type</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		</thead>
		@foreach($words as $word)
				<tr >
					<td>{!!$word->text!!}</td>
					<td>{!!$word->translation!!}</td>
					<td>{!!$word->type!!}</td>
					
					
					<td>
						
						<?php
							echo
							'<a href="words/'.$word->id .'/edit">
								<span class="glyphicon glyphicon-cog"></span>
							</a>'
						?>
					</td>
					<td>
						
						

						{!! Form::open(array('route' => array('words.destroy', $word->id), 'method' => 'delete')) !!}

					
							
   						 <button type="submit" style="background-color: Transparent;  border: none;">
   						 <span class="glyphicon glyphicon-remove"></span>
   						  </button>
						{!! Form::close() !!}
					</td>

				<tr>
			
		@endforeach
	</table>
	
@stop

@section('navbar')

<ul class="nav nav-pills nav-stacked">
    <li role="presentation" ><a href="/mygame/public">Home</a></li>
    <li role="presentation" ><a href="users">Users</a></li>
    <li role="presentation" class="active"><a href="words">Words</a></li>
        <li role="presentation"><a href="mywords">My Words</a></li>
  </ul>

@stop