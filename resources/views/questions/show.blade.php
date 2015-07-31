@extends('default')

@section('title', $question->title)

@section('scripts')
	<script type="text/javascript" src="{{ url('js/app.js') }}"></script>
@stop

@section('content')

	<div class="page">
		<div class="page__body">
			<header class="question__header">

				@include('users.partials.summary', ['user' => $question->user])

				<div class="question__header_subscribers">
					<ul class="subscribers-list">
						<li class="subscribers-list__item"><a href="#" class="subscribers-list__user"><img src="{{ url('img/user3.png') }}"></a></li>
						<li class="subscribers-list__item subscribers-list__item_more"><a href="#" class="btn_dott"></a></li>
					</ul>
				</div>
			</header>
			<div class="question__body">
				<ul class="question__tags">
					<?php $firstTag = $question->tags->shift() ?>
					<li class="question__tags-item">
						<i class="icon-tag"></i> <a href="{{ route('tag', ['slug' => $firstTag->slug]) }}">{{ $firstTag->title }}</a>
					</li>
					@forelse ($question->tags as $tag)
						<li class="question__tags-item">
							<a href="{{ route('tag', ['slug' => $tag->slug]) }}">{{ $tag->title }}</a>
						</li>
					@empty
					@endforelse
				</ul>
				<h2 class="question__title">{{ $question->title }}</h2>
				<p class="question__text">{{ $question->body }}</p>
				<ul class="question__attr">
					<li>Вопрос задан {{ $question->created_at->diffForHumans() }}</li>
					<li>{{ $question->veiwCountHumans }}</li>
				</ul>
				<div class="button-group">
					<a href="#" class="btn_subscribe">Подписаться
					@if($question->subscribersCount)
						<span class="subscribe_count">{{ $question->subscribersCount }}</span>
					@endif
					</a>
					<a href="#" class="btn_comment-toogle"><span>{{ $question->commentsCount or 'Комментировать' }}</span></a>
					<div class="dropdown dropdown_settings">
						<button class="btn btn_settings btn_dott"></button>
					</div>
					<div class="dropdown dropdown_share">
						<button class="btn btn_share icon-share"></button>
					</div>
				</div>
				<div class="answer__comments">
					<ul class="list-content list-content_comments">

						@each('comments.show', $question->comments, 'comment')
						
					</ul>
				</div>
			</div>
			<div class="question__additional" id="answers">

			@if ($count = $question->answers->count())

				<section class="section section_answers">
					<header class="section-header">
						<h3 class="section-header__title">Ответы на вопрос ({{ $count }})</h3>
					</header>
					<ul class="list-content list-content_answers">

						@each('answers.partials.item', $question->answers, 'answer')

					</ul>
				</section>

			@endif

			</div>
		</div>
	</div>

@stop