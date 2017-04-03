<form role="form" lpformnum="1" method="POST" action="{{ route('admin.q.update', ['id' => $question->id]) }}">
	{{ method_field('PUT') }}
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="box-body">
		<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
			<label for="title">Заголовок</label>
			<input type="text" class="form-control" name="title" id="title" value="{{ $question->title }}">
			{!! $errors->first('title', '<p class="text-red">:message</p>') !!}
		</div>
		<div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
			<label for="body">Описание</label>
			<textarea class="textarea" id="body" rows='15' name="body" style="width: 100%">{{ $question->body }}</textarea>	
			{!! $errors->first('body', '<p class="text-red">:message</p>') !!}				
		</div>
		<div class="form-group {{ $errors->has('tag_id') ? 'has-error' : '' }}">
			<label for="tags">Теги</label>
			<select id="tags" name="tag_id[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="" style="width: 100%;" tabindex="-1" aria-hidden="true">
				@foreach($tags as $tag)
                	<option {{ $question->tags->contains($tag) ? 'selected' : '' }} value={{ $tag->id }}>{{ $tag->title }}</option>
				@endforeach
            </select>
            {!! $errors->first('tag_id', '<p class="text-red">:message</p>') !!}
		</div>
	</div>
	<div class="box-footer">
		<button type="submit" class="btn btn-primary">Сохранить</button>
	</div>
</form>