@extends('admin.master')

@section('styles')
	{{ HTML::style('admin/css/animal-index.css') }}
@stop

@section('content')

	<!-- ROW -->
	<div class="row">
	{{ Form::open(['action'=> 'AnimalController@index', 'method'=>'GET']) }}
		<div class="large-12 columns">
			<div class="panel panel-filters-wrap">
				<div class="row large-collapse medium-collapse">
					<div class="medium-1 large-1 large-offset-2 medium-offset-2 columns filter-text-column">
						<p>Filters:</p>
					</div>
					<div class="medium-2 large-2 columns">
						<select name="species_id" class="index-select-filter" id="species">
							<option value="0">All Species</option>
							@foreach($species as $specie)<option value="{{ $specie->id }}">{{ $specie->name }}</option>@endforeach
						</select>
					</div>
					<div class="medium-2 large-2 columns">
						<select name="breed_id" class="index-select-filter" id="breed">
							<option value="0">All Breeds</option>
						</select>
					</div>
					<div class="medium-2 large-2 columns">
						<select name="status_id" class="index-select-filter" id="status">
							<option value="0">All Status</option>
							@foreach($statuses as $status)<option value="{{ $status->id }}">{{ $status->name }}</option>@endforeach
						</select>
					</div>
					<div class="medium-1 large-1 columns end">
						{{ Form::submit('Go', ['class'=>'button tiny filter-go-button']) }}
					</div>
				</div>
			</div>
		</div>
	{{ Form::close() }}
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
					<label for="">Breed: {{ $animal->breed->name }} </label>
					<label for="">Status: {{ $animal->status->name }} </label>
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
	{{ HTML::script('admin/js/animal-index.js') }}
@stop