<nav class="page__tabs">
	<ul class="tabs">
		@foreach($menu_items as $title => $url)
			@if(Request::url() == $url)
				<li class="current"><span class="main-menu__item">{{ $title }}</span></li>
			@else
				<li><a href="{{ $url }}" class="main-menu__item">{{ $title }}</a></li>
			@endif
		@endforeach
	</ul>
</nav>