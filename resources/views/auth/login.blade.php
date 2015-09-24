@extends('default')

@section('title', 'Вход')

@section('content')

	<div class="page">

		<header class="page__header login-header">
			<h1 class="page__header-title">Вход</h1>
		</header>

		<div class="page__body">
			@if(session('message'))
				<p class="alert">{{ session('message') }}</p>
			@endif
			@foreach ($errors->all() as $error)
		        <p class="error">{{ $error }}</p>
		    @endforeach
			{!! Form::open(['class' => 'form login-form']) !!}

				{!! Form::label('email', 'Email', ['class' => 'form__label']) !!}
				{!! Form::email('email', null, ['class' => 'form__control', 'required']) !!}

				{!! Form::label('password', 'Password', ['class' => 'form__label']) !!}
				{!! Form::password('password', ['class' => 'form__control', 'required']) !!}

				{!! Form::submit('Войти', ['class' =>'form__btn btn btn_submit']) !!}

			{!! Form::close() !!}
		</div>

	</div>

@stop