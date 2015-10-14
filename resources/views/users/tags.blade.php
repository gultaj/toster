@extends('default')

@section('title', 'Теги пользователя ' . $user->nickname)

@section('content')

<div class="page">

	@include('users.partials.header')

	<div class="page__body">
		<ul class="content-list content-list_cards">
			@foreach($tags as $tag)
			<li class="content-list__item">
				<article class="card">
					<header class="card__head"><a href="{{ route('tag', ['slug' => $tag->slug]) }}" class="card__head-image"><i class="icon-tag"></i></a>
						<h2 class="card__head-title"><a href="{{ route('tag', ['slug' => $tag->slug]) }}">{{ $tag->title }}</a></h2>
					</header>
					<div class="card__stats">
						<ul class="inline-list">
							<li class="list-item list-item_bullet">
								@if($tag->answersCount)
									<a href="#" class="card__stats-counter">{{ $tag->answersCountHuman }}</a></li>
								@else
									<span class="card__stats-counter_zero">{{ $tag->answersCountHuman }}</span>
								@endif
							</li>
							<li class="list-item list-item_bullet">
								@if($tag->questionsCount)
									<a href="#" class="card__stats-counter">{{ $tag->questionsCountHuman }}</a>
								@else
									<span class="card__stats-counter_zero">{{ $tag->questionsCountHuman }}</span>
								@endif
							</li>
						</ul>
					</div>
					<div class="card__rate"><strong>2</strong> Вклад в тег
						<div class="progress">
							<div class="progress__bar"></div>
						</div>
					</div>
					<div class="card__buttons">
						@if ($currentUser and $tag->hasSubscriber($currentUser))
							<a href="{{ route('tag.subscribe', ['slug' => $tag->slug]) }}" class="btn_subscribe btn_subscribe-active">
								Вы подписаны<span class="subscribe_count">{{ $tag->subscribersCount }}</span>
							</a>
						@else
							<a href="{{ route('tag.subscribe', ['slug' => $tag->slug]) }}" class="btn_subscribe">Подписаться<span class="subscribe_count">{{ $tag->subscribersCount }}</span></a>
						@endif
					</div>
				</article>
			</li>
			@endforeach
		</ul>
	</div>
</div>

@stop