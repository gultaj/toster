@extends('default')

@section('title', 'Регистрация')

@section('content')

	<div class="page">

		<header class="page__header login-header">
			<h1 class="page__header-title">Регистрация</h1>
			<a href="{{ route('auth.login') }}" class="login-header__link">Вход</a>
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

				{!! Form::label('nickname', 'Никнейм', ['class' => 'form__label']) !!}
				{!! Form::text('nickname', null, ['class' => 'form__control', 'required']) !!}

				{!! Form::label('password', 'Пароль', ['class' => 'form__label']) !!}
				{!! Form::password('password', ['class' => 'form__control', 'required']) !!}

				{!! Form::label('password_confirmation', 'Пароль ещё раз', ['class' => 'form__label']) !!}
				{!! Form::password('password_confirmation', ['class' => 'form__control', 'required']) !!}

				{!! Form::submit('Зарегистрироваться', ['class' =>'form__btn btn btn_submit']) !!}

			{!! Form::close() !!}
		</div>

	</div>

@stop