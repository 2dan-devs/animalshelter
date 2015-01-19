@extends('admin.master')

@section('styles')
	{{ HTML::style('admin/css/events-index.css') }}
@stop

@section('content')

	<div class="row">
		<div class="medium-12 large-12 columns">
			<div class="panel">
				<a href="{{ URL::to('admin/dashboard/events/create') }}" class="button small">Create Event</a>
			</div>
		</div>
	</div>

@stop

@section('scripts')
	{{ HTML::script('admin/js/events-index.js') }}
@stop