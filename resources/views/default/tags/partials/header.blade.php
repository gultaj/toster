<header class="page-header">
	<div class="page-header__info">
		<div class="page-header__image"><i class="icon-tag"></i></div>
		<h1 class="page-header__title">{{ $tag->title }}</h1>
	</div>
	<div class="page-header__stats">
		<ul class="inline-list inline-list_tags">
			<li><a href="#" class="mini-counter">
				<div class="mini-counter__count">{{ $tag->subscribersCount }}</div>
				<div class="mini-counter__value">{{ count_subscribers($tag->subscribersCount) }}</div>
			</a></li>
			<li><a href="#" class="mini-counter">
				<div class="mini-counter__count">{{ $tag->questions->count() }}</div>
				<div class="mini-counter__value">{{ count_questions($tag->questions->count()) }}</div>
			</a></li>
			<li><a href="#" class="mini-counter">
				<div class="mini-counter__count mini-counter__count_green">{{ $tag->solvedQuestionsPercent }}%</div>
				<div class="mini-counter__value">решено</div>
			</a></li>
		</ul>
	</div>
	<div class="page-header__buttons">
		@if ($currentUser and $tag->hasSubscriber($currentUser))
			<div class="btn-box btn_blue">
				<a href="{{ route('tag.subscribe', ['slug' => $tag->slug]) }}" class="btn_subscribe">Вы подписаны</a>
				<span class="subscribe_count"><i class="icon-cog"></i></span>
			</div>
		@else
			<div class="btn-box">
				<a href="{{ route('tag.subscribe', ['slug' => $tag->slug]) }}" data-token="{{ csrf_token() }}" class="btn_subscribe">Подписаться</a>
			</div>
		@endif
		<div class="dropdown dropdown_settings">
			<button class="btn btn_settings btn_dott"></button>
		</div>
	</div>
</header>

@include('partials.menu')