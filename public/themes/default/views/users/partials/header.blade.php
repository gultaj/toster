<header class="page-header page-header_user">
	<div class="page-header__info">
		<div class="page-header__image"><img src="{{ url($user->avatar) }}"></div>
		<h1 class="page-header__title">{{ $user->full_name }}</h1>
		<p class="page-header__desc">{{ $user->about }}</p>
	</div>
	<div class="page-header__stats">
		<ul class="inline-list inline-list_tags">
			<li><span class="mini-counter">
				<div class="mini-counter__count mini-counter__count-contribute">26</div>
				<div class="mini-counter__value">вклад</div>
			</span></li>
			<li><a href="{{ route('user.questions', ['nickname' => $user->nickname]) }}" class="mini-counter">
				<div class="mini-counter__count">{{ $count = $user->questions->count() }}</div>
				<div class="mini-counter__value">{{ count_questions($count) }}</div>
			</a></li>
			<li><a href="{{ route('user.answers', ['nickname' => $user->nickname]) }}" class="mini-counter">
				<div class="mini-counter__count">{{ $count = $user->answers->count() }}</div>
				<div class="mini-counter__value">{{ count_answers($count) }}</div>
			</a></li>
			<li><span class="mini-counter">
				<div class="mini-counter__count mini-counter__count_green">{{ $user->solutionsPercent }}%</div>
				<div class="mini-counter__value">решений</div>
			</span></li>
		</ul>
	</div>
</header>

@include('partials.menu')