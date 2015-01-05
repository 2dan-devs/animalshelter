@extends('admin.master')

@section('styles')
	{{HTML::style('admin/css/admin-create.css')}}
@stop

@section('content')

	<!-- Show Validation Errors -->
	@if($errors->has())
	<div class="row">
		<div class="medium-12 large-12 columns">
			@foreach($errors->all() as $error)
				<div class="alert-box warning radius">{{ $error }}</div>
			@endforeach
		</div>
	</div>
	@endif
	<!-- End Show Validation Errors -->

	<!-- Form Starts -->
	{{ Form::open(array('action' => 'AnimalController@store', 'method'=>'post', 'files'=>true)) }}
		<div class="row">
			<div class="medium-4 large-4 columns">
				<img id="preview-holder" src="#" alt="image preview">
				<label>Select Profile Photo:<input type="file" name="profile_photo" id="img-input" class="button tiny secondary" accept="image/*"></label>
			</div>
		</div>
		<div class="row">
			<div class="medium-4 large-4 columns">
				<label>Shelter Code:<input type="text" name="shelter_code" placeholder="shelter code"></label>
			</div>
		</div>
		<div class="row">
			<div class="medium-6 large-6 columns">
				<label>Animal Name:<input type="text" name="name" placeholder="enter name"></label>
			</div>
			<div class="medium-6 large-6 columns">
				<label>Date of Birth (mm/dd/yyyy):<input type="text" name="dob" id="datepicker_dob" placeholder="click to select date" required></label>
			</div>
		</div>
		<div class="row">
			<div class="medium-6 large-6 columns">
				<label>Date In (mm/dd/yyyy):<input type="text" name="date_in" id="datepicker_date-in" placeholder="click to select date" required></label>
			</div>
			<div class="medium-6 large-6 columns">
				<label>Date Out (mm/dd/yyyy):<input type="text" name="date_out" id="datepicker_date-out" placeholder="click to select date"></label>
			</div>
		</div>
		<div class="row">
			<div class="medium-4 large-4 columns">
				<label>Select Species
					<select name="species_id" id="species" required>
						<option value="">-</option>
						@foreach($species as $specie)<option value="{{$specie->id}}">{{$specie->name}}</option>@endforeach
					</select>
				</label>
			</div>
			<div class="medium-4 large-4 columns">
				<label>Select Breed
					<select name="breed_id" id="breed" required>
						<option value="">-</option>
					</select>
				</label>
			</div>
			<div class="medium-4 large-4 columns">
				<label>Select Status
					<select name="status_id" id="statuses" required>
						<option value="">-</option>
						@foreach($statuses as $status)<option value="{{$status->id}}">{{$status->name}}</option>@endforeach
					</select>
				</label>
			</div>
		</div>
		<div class="row">
			<div class="medium-12 large-12 columns">
				<label>Description (max 400 chars):<textarea class="create-record-description" name="description" placeholder="Enter Description"></textarea></label>
			</div>
		</div>
		<div class="row">
			<div class="medium-12 large-12 columns">
				<a href="{{ URL::to('admin/dashboard') }}"><i class="fa fa-chevron-circle-left fa-lg"> Dashboard</i></a>
				{{Form::submit('Create Record', ['class'=>'button small right']);}}
				{{Form::reset('Reset', ['class'=>'button small secondary right', 'id'=>'reset-form']);}}
			</div>
		</div>
	{{ Form::close() }}
	<!-- Form Ends -->

@stop

@section('scripts')
	{{HTML::script('admin/js/admin-create.js')}}
@stop