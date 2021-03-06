<li class="list-content__item" id="answer_{{ $answer->id }}">
	
	@include('users.partials.summary', ['user' => $answer->user])


	<div class="answer__text">{{ $answer->body }}
		<ul class="question__attr">
			<li>Ответ написан {{ $answer->created_at->diffForHumans() }}</li>
		</ul>
		<div class="button-group">
			<a href="{{ route('like', ['answer_id' => $answer->id]) }}" 
				@if (\Auth::user() && $answer->likes->contains(\Auth::user()->id))
					class="btn_like btn_like_liked">Вам нравится
				@else
					class="btn_like">Нравится
				@endif
			@if ($count = $answer->likes->count())
				<span class="like_count">{{ $count }}</span>
			@endif
			</a>
			<a href="#" class="btn_comment-toogle"><span>{{ $answer->commentsCountHumans or 'Комментировать' }}</span></a>
			<div class="dropdown dropdown_settings">
				<button class="btn btn_settings btn_dott"></button>
			</div>
			<div class="dropdown dropdown_share"><a href="#">
				<button class="btn btn_share icon-share"></button></a>
			</div>
		</div>
		<div class="answer__comments active">
			<comment-list :data="{{ $answer->comments }}"></comment-list>
            {{--  <ul class="list-content list-content_comments" id="comments_list_{{ $answer->id }}">

            	@each('comments.show', $answer->comments, 'comment')

            	@include('comments.form', ['typeId' => $answer->id, 'commentType' => 'answer'])
            	
            </ul>  --}}
        </div>
	</div>
</li>