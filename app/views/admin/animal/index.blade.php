@extends('admin.master')

@section('styles')
	{{ HTML::style('admin/css/animal-index.css') }}
@stop

@section('content')

	<!-- ROW -->
	<div class="row">
		<div class="medium-12 large-12 columns">
			<div class="panel">
				Filters here
			</div>
		</div>
	</div>
	<!-- ROW -->
	<div class="row">

		<!-- Display all records -->
		@foreach ($allAnimals as $animal)
			<div class="medium-4 large-3 columns end">
				<div class="panel index-panel">
					<div class="index-profile-photo-wrap">{{ HTML::image($animal->profile_photo, 'profile photo', ['class' => 'index-profile-photo']) }}</div>
					<label for="">Name: {{ $animal->name }} </label>
					<label for="">Date In: {{ $animal->date_in }} </label>
					<label for="">Species: {{ $animal->species->name }} </label>
					<a class="small button index-edit-button" href="{{ URL::to('admin/dashboard/animal/' .$animal->id. '/edit') }}">Update</a>
					{{ Form::open(['method' => 'DELETE', 'route' => ['admin.dashboard.animal.destroy', $animal->id],
						'onsubmit' => 'return confirm("This action is NOT reversible. Are you sure to delete this record?")']) }}
		  			{{ Form::submit('Delete', array('type' => 'submit', 'class' => 'button small warning index-delete-button')) }}
					{{ Form::close() }}
				</div>
			</div>
		@endforeach
		<!-- End display all records -->

	</div>
	<!-- ROW -->
	<div class="row">
		<div class="medium-4 large-3 columns">
			<div class="panel index-page-links">{{ $allAnimals->links() }}</div>
		</div>
	</div>
	<!-- ROW -->
@stop

@section('scripts')
@stop