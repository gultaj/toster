@extends('default')

@section('title', 'Редактирование вопроса')

@section('header')
<h1>Редактирование вопроса
	<small><a class="btn btn-xs btn-flat btn-info" href="{{ route('q', ['id' => $question->id]) }}">Просмотреть</a></small>
</h1>
<ol class="breadcrumb">
	<li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="{{ route('admin.q.index') }}">Вопросы</a></li>
	<li class="active">{{ mb_substr($question->title, 0, 30) }}...</li>
</ol>
@endsection

@section('content')

<div class="row">
	<div class="col-xs-9">
		@include('partials.flash')
		<div class="box box-primary">
			<form role="form" lpformnum="1" method="POST" action="{{ route('admin.q.update', ['id' => $question->id]) }}">
				{{ method_field('PUT') }}
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="box-body">
					<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
						<label for="title">Заголовок</label>
						<input type="text" class="form-control" name="title" id="title" value="{{ $question->title }}">
						{!! $errors->first('title', '<p class="text-danger">:message</p>') !!}
					</div>
					<div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
						<label for="body">Описание</label>
						<textarea class="textarea" id="body" rows='15' name="body" style="width: 100%">{{ $question->body }}</textarea>	
						{!! $errors->first('body', '<p class="text-danger">:message</p>') !!}				
					</div>
					<div class="form-group {{ $errors->has('tag_id') ? 'has-error' : '' }}">
						<label for="tags">Теги</label>
						<select id="tags" name="tag_id[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="" style="width: 100%;" tabindex="-1" aria-hidden="true">
							@foreach($tags as $tag)
			                	<option {{ $question->tags->contains($tag) ? 'selected' : '' }} value={{ $tag->id }}>{{ $tag->title }}</option>
							@endforeach
		                </select>
		                {!! $errors->first('tag_id', '<p class="text-danger">:message</p>') !!}
					</div>
				</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Сохранить</button>
				</div>
			</form>
		</div>
	</div>
	<div class="col-xs-3">
		<div class="box box-primary widget-user-2">
			<div class="widget-user-header">
				<div class="widget-user-image">
			    	<img class="img-circle" src="{{ url($question->user->avatar) }}" alt="User Avatar">
			    </div>
			    <!-- /.widget-user-image -->
		    	<h3 class="widget-user-username">{{ $question->user->fullName }}</h3>
		    	<h5 class="widget-user-desc">{{ '@'.$question->user->nickname }}</h5>
			</div>
			<div class="box-footer no-padding">
				<ul class="nav nav-stacked">
			    	<li><a>Дата создания <span class="pull-right">{{ $question->created_at }}</span></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
	@parent
	<script src="{{ theme('js/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript"></script>
	<script src="{{ theme('js/select2.full.min.js') }}" type="text/javascript"></script>
	<script type="text/javascript">$('#body').wysihtml5(); $('.select2').select2();</script>
@endsection

@section('styles')
	<link href="{{ theme('css/select2.min.css') }}" rel="stylesheet" type="text/css" />
	@parent
	<link href="{{ theme('css/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css" />
@endsection