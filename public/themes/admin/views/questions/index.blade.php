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
	          			<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
				            <thead>
					            <tr role="row">
					            	<th>N</th>
					            	<th class="sorting_asc"aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending">Заголовок</th>
					            	<th class="sorting" aria-controls="example2" rowspan="1" colspan="1">Теги</th>
					            	<th class="sorting" aria-controls="example2" rowspan="1" colspan="1">Комментарии</th>
					            	<th class="sorting" aria-controls="example2" rowspan="1" colspan="1">Автор</th>
					            	<th class="sorting" aria-controls="example2" rowspan="1" colspan="1">Дата</th>
					            	<th class="sorting" aria-controls="example2" rowspan="1" colspan="1">Решён</th>
					            </tr>
				            </thead>
				            <tbody>
				            	@foreach($questions as $i => $question)
				                <tr role="row" class="odd">
				                	<td>{{ ++$i + $questions->perPage() * ($questions->currentPage()-1) }}</td>
				                  	<td class="sorting_1">{{ $question->title}}</td>
				                  	<td></td>
				                  	<td></td>
				                  	<td></td>
				                  	<td>{{ $question->created_at->diffForHumans() }}</td>
				                  	<td>{{ $question->is_resolved }}</td>
				                </tr>
				                @endforeach
	                		</tbody>
	                		<tfoot>
	                			<tr>
		                			<th>N</th>
	                				<th rowspan="1" colspan="1">Заголовок</th>
					            	<th rowspan="1" colspan="1">Теги</th>
					            	<th rowspan="1" colspan="1">Комментарии</th>
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
              				Показано с {{ $questions->perPage() * ($questions->currentPage()-1)+1 }} по {{ $questions->perPage() * $questions->currentPage() }} из {{ $questions->total() }} вопросов
              			</div>
              		</div>
              		<div class="col-sm-7">
              			<div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
              				<!-- <ul class="pagination">
              					<li class="paginate_button previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0">Next</a></li>
              				</ul> -->
							
							{!! $questions->render() !!}

              			</div>
              		</div>
              	</div>
            </div>
	    </div>
	    <!-- /.box-body -->
	</div>
	<!-- /.box -->

@endsection