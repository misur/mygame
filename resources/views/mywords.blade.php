@extends('layouts.master')

@section('title')
	Words
@stop


@section('content')
	
	<h2>All my words: </h2>

	<!-- TODO: finish  -->
	{{-- Todo --}}

	{{-- test: --}}

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
		@foreach($myword as $word)
				<tr >
					<td>{!!$word->user_id!!}</td>
					<td>{!!$word->word_id!!}</td>
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
    <li role="presentation" ><a href="words">Words</a></li>
        <li role="presentation" class="active"><a href="mywords">My Words</a></li>
  </ul>

@stop