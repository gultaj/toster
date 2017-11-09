@extends('default')

@section('title', 'Регистрация')

@section('content')

	<div class="page">

		<header class="page__header login-header">
			<h1 class="page__header-title">Регистрация</h1>
			<a href="{{ route('login') }}" class="login-header__link">Вход</a>
		</header>

		<div class="page__body">
			@if(session('message'))
				<p class="alert">{{ session('message') }}</p>
			@endif
			@foreach ($errors->all() as $error)
		        <p class="error">{{ $error }}</p>
		    @endforeach

			<form action="{{ route('register') }}" method="post" class="form login-form">
				{{ csrf_field() }}

				<label for="email" class="form__label">Email</label>
				<input type="email" id="email" name="email" value="{{ old('email') }}" class="form__control" required>

				<label for="nickname" class="form__label">Никнейм</label>
				<input type="text" id="nickname" name="nickname" value="{{ old('nickname') }}" class="form__control" required>

				<label for="password" class="form__label">Пароль</label>
				<input type="password" id="password" name="password" value="" class="form__control" required>

				<label for="password_confirmation" class="form__label">Повторите пароль</label>
				<input type="password" id="password_confirmation" name="password_confirmation" value="" class="form__control" required>

				<button type="submit" class="form__btn btn btn_submit">Зарегистрироваться</button>
			</form>
		</div>

	</div>

@stop