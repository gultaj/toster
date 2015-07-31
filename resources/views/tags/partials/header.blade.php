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
	<div class="page-header__buttons"><a href="#" class="btn_subscribe">Подписаться</a>
		<div class="dropdown dropdown_settings">
			<button class="btn btn_settings btn_dott"></button>
		</div>
	</div>
</header>

@include('partials.menu')