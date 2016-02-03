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
              			<div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
							{!! $pagination->render() !!}
              			</div>
	          		</div>
	          		<div class="col-sm-12">
	          			@include('questions.partials.table')
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