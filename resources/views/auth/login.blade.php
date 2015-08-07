@extends('default')

@section('title', 'Вход')

@section('content')

	<div class="page">

		<div class="page__body">

			<h1>Вход</h1>
			
			{!! Form::open() !!}
				{!! Form::label('email') !!}
				{!! Form::email('email') !!}

				{!! Form::label('password') !!}
				{!! Form::password('password') !!}
				
				{!! Form::submit('Вход') !!}
			{!! Form::close() !!}

		</div>
	</div>

@stop