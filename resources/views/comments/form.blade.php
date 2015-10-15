<li class="list-content__item comment_form">
	{!! Form::open(['route' => 'comment', 'class' => 'form_comments', 'id' => $commentType.'_comments_id' ]) !!}
	<form id="{{ $commentType or 'answer' }}_comments_id" class="form_comments">
		<input type="hidden" name="{{ $commentType or 'answer' }}_id" value="{{ $typeId }}">
		<div class="field">
			<textarea rows="1" name="body" class="comment__field"></textarea>
		</div>
		<div class="form__buttons">
			<input type="submit" class="form__submit">
		</div>
	{!! Form::close() !!}
</li>