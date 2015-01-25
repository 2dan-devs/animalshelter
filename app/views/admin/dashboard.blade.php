@extends('admin.master')

@section('styles')
	{{HTML::style('admin/css/admin-dashboard.css')}}
@stop

@section('content')

	<div class="row">
		<div class="large-4 medium-4 columns">
			<div class="panel dash-panel">
				<a class="dash-button button large" href="{{ URL::to('admin/dashboard/animal/create') }}">Add<br>Animal<br>Record</a>
			</div>
		</div>
		<div class="large-4 medium-4 columns">
			<div class="panel dash-panel">
				<a class="dash-button button large" href="{{ URL::to('admin/dashboard/animal') }}">View / Edit<br>All<br>Records</a>
			</div>
		</div>
		<div class="large-4 medium-4 columns">
			<div class="panel dash-panel">
				<a class="dash-button button large" href="{{ URL::to('admin/dashboard/attributes') }}">Species<br>Breeds<br>Status</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="large-4 medium-4 columns">
			<div class="panel dash-panel">
				<a class="dash-button button large" href="{{ URL::to('admin/dashboard/contactus') }}">Edit<br>Contact Us<br>Information</a>
			</div>
		</div>
		<div class="large-4 medium-4 columns">
			<div class="panel dash-panel">
				<a class="dash-button button large" href="{{ URL::to('admin/dashboard/aboutus') }}">Edit<br>About Us<br>Information</a>
			</div>
		</div>
		<div class="large-4 medium-4 columns">
			<div class="panel dash-panel">
				<a class="dash-button button large" href="{{ URL::to('admin/dashboard/events') }}">Edit<br>Shelter<br>Events</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="large-4 medium-4 columns">
			<div class="panel dash-panel">
				<a class="dash-button button large" href="#">Edit<br>Newsletters<br>Subscribers</a>
			</div>
		</div>
		<div class="large-4 medium-4 columns">
			<div class="panel dash-panel">
				<a class="dash-button button large secondary disabled" href="#"></a>
			</div>
		</div>
		<div class="large-4 medium-4 columns">
			<div class="panel dash-panel">
				<a class="dash-button button large secondary disabled" href="#"></a>
			</div>
		</div>
	</div><br><br>

@stop