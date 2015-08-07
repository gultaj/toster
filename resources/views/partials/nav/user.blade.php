<aside class="navbar">
    <div class="navbar__logo"><a href="{{ route('home') }}">Tosber</a></div>
    <div class="panel">
            <a class="panel-user" href="{{ route('user', ['nickname' => Auth::user()->nickname]) }}">
                <img class="panel-user__avatar" src="{{ url(Auth::user()->avatar) }}"> 
                {{ Auth::user()->nickname }} </a>
        </div>
    <ul class="main-menu">
        <li class="current"><a href="#"><i class="icon-list-bullet"></i> Все вопросы</a></li>
        <li><a href="#"><i class="icon-tags"></i> Все теги</a></li>
        <li><a href="#"><i class="icon-user"></i> Пользователи</a></li>
    </ul>
</aside>