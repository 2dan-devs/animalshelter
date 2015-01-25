@extends('admin.master')

@section('styles')
	{{ HTML::style('admin/css/admin-aboutus.css') }}
@stop

@section('content')
	{{ Form::open(['route'=>['admin.dashboard.aboutus.update', $aboutus->id], 'method'=>'PUT']) }}
	<div class="row">
		<div class="medium-4 large-4 columns">
			<div class="panel">
				<label for="title">Title:
					<input name="title" type="text" value="{{ $aboutus->title }}">
				</label>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="medium-12 large-12 columns">
			<div class="panel">
				<label for="textarea">Content:
					<textarea name="body" class="textarea-input">{{ $aboutus->body }}</textarea>
				</label>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="medium-12 large-12 columns">
			<a href="{{URL::to('admin/dashboard')}}"><br><i class="fa fa-chevron-circle-left fa-lg left"> Dashboard</i></a>
			{{ Form::submit('Update', ['class'=>'button radius small right']) }}
		</div>
	</div>
	{{ Form::close() }}
@stop

@section('scripts')
	{{ HTML::script('admin/js/animal-aboutus.js') }}
@stop