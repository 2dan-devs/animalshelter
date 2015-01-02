@extends('admin.master')

@section('content')

	<div class="row">
		<div class="large-4 medium-4 columns">
			<div class="panel dash-panel">
				<a class="dash-button button large radius" href="{{ URL::to('admin/animal/create') }}">Add<br>Animal<br>Record</a>
			</div>
		</div>
		<div class="large-4 medium-4 columns">
			<div class="panel dash-panel">
				<a class="dash-button button large radius" href="#">View / Edit<br>Animals</a>
			</div>
		</div>
		<div class="large-4 medium-4 columns">
			<div class="panel dash-panel">
				<a class="dash-button button large radius" href="#">Edit<br>Newsletters<br>Subscribers</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="large-4 medium-4 columns">
			<div class="panel dash-panel">
				<a class="dash-button button large radius" href="#">Species<br>Breeds<br>Status</a>
			</div>
		</div>
		<div class="large-4 medium-4 columns">
			<div class="panel dash-panel">
				<a class="dash-button button large radius" href="#">Edit<br>Contact Us<br>About Us</a>
			</div>
		</div>
		<div class="large-4 medium-4 columns">
			<div class="panel dash-panel">
				<a class="dash-button button large radius" href="#">Edit<br>Events</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="large-4 medium-4 columns">
			<div class="panel dash-panel">
				<a class="dash-button button large radius secondary disabled" href="#">Placeholder</a>
			</div>
		</div>
		<div class="large-4 medium-4 columns">
			<div class="panel dash-panel">
				<a class="dash-button button large radius secondary disabled" href="#">Placeholder</a>
			</div>
		</div>
		<div class="large-4 medium-4 columns">
			<div class="panel dash-panel">
				<a class="dash-button button large radius secondary disabled" href="#">Placeholder</a>
			</div>
		</div>
	</div>

@stop