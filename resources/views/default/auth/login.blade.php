@extends('default')

@section('title', 'Вход')

@section('content')

	<div class="page">

		<header class="page__header login-header">
			<h1 class="page__header-title">Вход</h1>
			<a href="{{ route('register') }}" class="login-header__link">Регистрация</a>
		</header>

		<div class="page__body">
			@if(session('message'))
				<p class="alert">{{ session('message') }}</p>
			@endif
			@foreach ($errors->all() as $error)
		        <p class="error">{{ $error }}</p>
		    @endforeach

			<form action="{{ route('login') }}" method="post" class='form login-form'>
				{{ csrf_field() }}
				<label for="email" class="form__label">Email</label>
				<input type="email" name="email" id="email" class="form__control" value="{{ old('email') }}" required>

				<label for="password" class="form__label">Password</label>
				<input type="password" name="password" id="password" class="form__control" required>

				<button type="submit" class="form__btn btn btn_submit">Войти</button>

			</form>
		</div>

	</div>

@stop