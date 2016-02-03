<table id="example2" class="table table-bordered table-striped table-hover dataTable" role="grid" aria-describedby="example2_info">
	<thead>
	    <tr role="row">
	    	<th>N</th>
	    	<th class="sorting_asc"aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending">Заголовок</th>
	    	<th class="sorting" aria-controls="example2" rowspan="1" colspan="1">Теги</th>
	    	<th class="sorting" aria-controls="example2" rowspan="1" colspan="1">Ответы</th>
	    	<th class="sorting" aria-controls="example2" rowspan="1" colspan="1">Автор</th>
	    	<th style="min-width:135px;" class="sorting" aria-controls="example2" rowspan="1" colspan="1">Дата</th>
	    	<th class="sorting" aria-controls="example2" rowspan="1" colspan="1">Решён</th>
	    </tr>
	</thead>
<tbody class="hover_buttons">
	@foreach($questions as $i => $question)
        <tr role="row" class="{{ ($i & 1) ? 'odd' : 'even' }}">
        	<td>{{ $i + $pagination->from() }}</td>
          	<td class="sorting_1" style="position: relative;padding-right:65px;">
          		<a href="{{ route('admin.q.edit', ['id'=> $question->id]) }}">{{ $question->title}}</a>
        		<div class="pull-right buttons_group">
        			<a href="{{ route('q', ['id' => $question->id]) }}" class="text-blue"><i class="glyphicon glyphicon-eye-open"></i></a>
        			<a href="{{ route('admin.q.edit', ['id'=> $question->id]) }}" class="text-yellow"><i class="glyphicon glyphicon-pencil"></i></a>
        			<a href="{{ route('admin.q.destroy', ['id'=> $question->id]) }}" class="text-red"><i class="glyphicon glyphicon-trash"></i></a>
        		</div>
          	</td>
          	<td>
          		@foreach ($question->tags as $tag) 
					<a href="#">{{ $tag->title }}</a>,
				@endforeach
          	</td>
          	<td class="text-center">{{ $question->answersCount }}</td>
          	<td><a href="#">{{ '@'.$question->user->nickname }}</a></td>
          	<td>{{ $question->created_at }}</td>
          	<td class="text-center">{!! $question->is_resolved ? '<i class="glyphicon glyphicon-ok-sign text-green"></i>' : '' !!}</td>
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