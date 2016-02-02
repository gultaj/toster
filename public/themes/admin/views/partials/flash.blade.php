@if(\Session::has('alerts'))
	@foreach (\Session::get('alerts') as $type => $message)
		<div class="alert alert-{{ $type }} alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<!-- <h4><i class="icon fa fa-ban"></i> Alert!</h4> -->
			{{ $message }}
		</div>
	@endforeach
@endif