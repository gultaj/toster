<li class="list-content__item comment_form">
	<form id="{{ $commentType or 'answer' }}_comments_id" class="form_comments" action="{{ route('comment') }}" method="post">
		<input type="hidden" name="{{ $commentType or 'answer' }}_id" value="{{ $typeId }}">
		<div class="field">
			<textarea rows="1" name="body" class="comment__field"></textarea>
		</div>
		<div class="form__buttons">
			<input type="submit" class="form__submit">
		</div>
		{{ csrf_field() }}
	</form>
</li>