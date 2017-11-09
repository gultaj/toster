<li class="list-content__item comment">
	<div class="comment__header">
		<div class="user-summary user-summary_comment">
			@include('users.partials.summary-comment', ['user' => $comment->user])
		</div>
	</div>
	<div class="comment__body">
		<div class="comment__body_inner">
			<div class="comment__text">{{ $comment->body }}</div>
			<div class="comment__date">Написано {{ $comment->created_at->diffForHumans() }}</div>
			<div class="button-group button-group_comment"><a href="#" class="btn_answer">Ответить</a>
				<div class="dropdown dropdown_settings">
					<button class="btn btn_settings btn_dott"></button>
				</div>
			</div>
		</div>
	</div>
</li>