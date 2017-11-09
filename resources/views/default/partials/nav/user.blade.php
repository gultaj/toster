<aside class="navbar">
	<div class="navbar__logo"><a href="{{ route('home') }}">Tosber</a></div>
	<div class="panel">
		<div class="panel__wrapper">
			<a class="panel-user user-logged" href="{{ route('user', ['nickname' => Auth::user()->nickname]) }}">
				<img class="panel-user__avatar" src="{{ url(Auth::user()->avatar) }}"> 
				{{ $currentUser->nickname }} </a>
			<button class="panel-arrow" ><i class="icon-down-open" role="panel-list-opening"></i></button>
		</div>
		<ul class="panel-list">
			<li><a href="#"><i class="icon-cog"></i> Настройки</a></li>
			<li><a href="{{ route('logout') }}"><i class="icon-logout"></i> Выйти</a></li>
		</ul>
	</div>
	<ul class="main-menu">
		<li class="current"><a href="#"><i class="icon-list-bullet"></i> Все вопросы</a></li>
		<li><a href="#"><i class="icon-tags"></i> Все теги</a></li>
		<li><a href="#"><i class="icon-user"></i> Пользователи</a></li>
	</ul>
</aside>