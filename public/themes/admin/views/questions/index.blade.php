@extends('default')

@section('title', 'Вопросы')

@section('header')

	<h1>Вопросы
	    <small></small>
	</h1>
	<ol class="breadcrumb">
	    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	    <li class="active">Вопросы</li>
	</ol>

@endsection

@section('content')

	<div class="row">
	    <div class="col-xs-12">
	      <div class="box">
	        <div class="box-body">
	          <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
	          	<div class="row">
	          		<div class="col-sm-12">
	          			<table id="example2" class="table table-bordered table-striped table-hover dataTable" role="grid" aria-describedby="example2_info">
				            <thead>
					            <tr role="row">
					            	<th>N</th>
					            	<th class="sorting_asc"aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending">Заголовок</th>
					            	<th class="sorting" aria-controls="example2" rowspan="1" colspan="1">Теги</th>
					            	<th class="sorting" aria-controls="example2" rowspan="1" colspan="1">Ответы</th>
					            	<th class="sorting" aria-controls="example2" rowspan="1" colspan="1">Автор</th>
					            	<th class="sorting" aria-controls="example2" rowspan="1" colspan="1">Дата</th>
					            	<th class="sorting" aria-controls="example2" rowspan="1" colspan="1">Решён</th>
					            </tr>
				            </thead>
				            <tbody>
				            	@foreach($questions as $i => $question)
				                <tr role="row" class="{{ ($i & 1) ? 'odd' : 'even' }}">
				                	<td>
				                		{{ ++$i + $questions->perPage() * ($questions->currentPage()-1) }}
				                	</td>
				                  	<td class="sorting_1">
				                  		<a href="{{ route('admin.q.edit', ['id'=> $question->id]) }}">{{ $question->title}}</a>
				                		<a href="" class="btn btn-xs bg-danger pull-right"><i class="glyphicon glyphicon-trash"></i></a>
				                		<a href="" class="btn btn-xs bg-warning pull-right"><i class="glyphicon glyphicon-pencil"></i></a>
				                  	</td>
				                  	<td>
				                  		@foreach ($question->tags as $tag) 
				                  		
											<a href="#">{{ $tag->title }}</a>,

										@endforeach
				                  	</td>
				                  	<td>{{ $question->answersCount }}</td>
				                  	<td><a href="#">{{ '@'.$question->user->nickname }}</a></td>
				                  	<td>{{ $question->created_at }}</td>
				                  	<td>{{ $question->is_resolved }}</td>
				                </tr>
				                @endforeach
	                		</tbody>
	                		<tfoot>
	                			<tr>
		                			<th>N</th>
	                				<th rowspan="1" colspan="1">Заголовок</th>
					            	<th rowspan="1" colspan="1">Теги</th>
					            	<th rowspan="1" colspan="1">Ответы</th>
					            	<th rowspan="1" colspan="1">Автор</th>
					            	<th rowspan="1" colspan="1">Дата</th>
					            	<th rowspan="1" colspan="1">Решён</th>
	                			</tr>
	                		</tfoot>
	              		</table>
              		</div>
              	</div>
              	<div class="row">
              		<div class="col-sm-5">
              			<div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
              				Показано с {{ $pagination->from() }} по {{ $pagination->to() }} из {{ $questions->total() }} вопросов
              			</div>
              		</div>
              		<div class="col-sm-7">
              			<div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
							
							{!! $pagination->render() !!}

              			</div>
              		</div>
              	</div>
            </div>
	    </div>
	    <!-- /.box-body -->
	</div>
	<!-- /.box -->

@endsection