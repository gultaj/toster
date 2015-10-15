<li class="list-content__item">

	<h2 class="question__title">
		<a href="{{ route('q', ['id' => $answer->question->id]) }}#answer_{{ $answer->id }}" 
			class="question__title-link">{{ $answer->question->title }}</a>
	</h2>	
	
	@include('users.partials.summary', ['user' => $user])


	<div class="answer__text">{{ $answer->body }}
		<ul class="question__attr">
			<li>Ответ написан {{ $answer->created_at->diffForHumans() }}</li>
		</ul>
		<div class="button-group">
			<a href="#" class="btn_like">Нравится
				@if ($count = $answer->likes->count())
					<span class="like_count">{{ $count }}</span>
				@endif
			</a>
			<a href="{{ route('q', ['id' => $answer->question->id]) }}#comments_list_{{ $answer->id }}" class="btn_comment">
				<span>{{ $answer->commentsCountHumans or 'Комментировать' }}</span>
			</a>
		</div>
	</div>
</li>