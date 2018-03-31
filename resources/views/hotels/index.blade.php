@extends('layouts.app')

@section('content')

@if (Auth::guest())
<div class="container">
    <div class="row">
        <div  class="col-md-10 col-md-offset-1">	
          	<div class="panel panel-default">
@endif
				<section class="content-header">
					<h1 class="pull-left">Find Your Hotel</h1>
					@if (!Auth::guest())
						<h1 class="pull-right">
						   <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('hotels.create') !!}">Add New</a>
						</h1>
					@endif
				</section>
				<div class="content">
					<div class="clearfix"></div>

					@include('flash::message')

					<div class="clearfix"></div>
					<div class="box box-primary">
						<div class="box-body">
							@include('hotels.table')
						</div>
					</div>
				</div>	
@if (Auth::guest())				
	      </div>
        </div>         
    </div>
</div>
@endif
@endsection

           
    

