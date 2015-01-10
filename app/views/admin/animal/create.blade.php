@extends('admin.master')

@section('styles')
	{{ HTML::style('admin/css/admin-create.css') }}
@stop

@section('content')

	<!-- Form Starts -->
	{{ Form::open(array('action' => 'AnimalController@store', 'method'=>'post', 'files'=>true)) }}
		<div class="row">
			<div class="medium-3 large-3 columns">
				<img id="preview-holder" src="#" alt="preview">
				<label>Select Profile Photo (optional):
					<input type="file" name="profile_photo" id="img-input" class="button tiny secondary" accept="image/*" value="{{ Input::old('profile_photo') }}">
				</label>
			</div>
		</div>
		<div class="row">
			<div class="medium-4 large-4 columns">
				<label>Shelter Code (optional):
					<input type="text" class="error" name="shelter_code" placeholder="shelter code" value="{{ Input::old('shelter_code') }}">
					@if ($errors->has('shelter_code')) <small class="error input-error-label">{{ $errors->first('shelter_code') }}</small> @endif
				</label>
			</div>
		</div>
		<div class="row">
			<div class="medium-6 large-6 columns">
				<label>Animal Name:
					<input type="text" name="name" class="error" placeholder="enter name" value="{{ Input::old('name') }}">
					@if ($errors->has('name')) <small class="error input-error-label">{{ $errors->first('name') }}</small> @endif
				</label>
			</div>
			<div class="medium-6 large-6 columns">
				<label>Date of Birth (mm/dd/yyyy):
					<input type="text" name="dob" class="error" id="datepicker_dob" placeholder="click to select date" value="{{ Input::old('dob') }}" required>
					@if ($errors->has('dob')) <small class="error input-error-label">{{ $errors->first('dob') }}</small> @endif
				</label>
			</div>
		</div>
		<div class="row">
			<div class="medium-6 large-6 columns">
				<label>Date In (mm/dd/yyyy):
					<input type="text" name="date_in" class="error" id="datepicker_date-in" placeholder="click to select date" value="{{ Input::old('date_in') }}" required>
					@if ($errors->has('date_in')) <small class="error input-error-label">{{ $errors->first('date_in') }}</small> @endif
				</label>
			</div>
			<div class="medium-6 large-6 columns">
				<label>Date Out (mm/dd/yyyy - optional):
					<input type="text" name="date_out" class="error" id="datepicker_date-out" placeholder="click to select date" value="{{ Input::old('date_out') }}">
					@if ($errors->has('date_out')) <small class="error input-error-label">{{ $errors->first('date_out') }}</small> @endif
				</label>
			</div>
		</div>
		<div class="row">
			<div class="medium-4 large-4 columns">
				<label>Select Species
					<select name="species_id" id="species" value="{{ Input::old('species_id') }}" required>
						@foreach($species as $specie)<option value="{{ $specie->id }}">{{ $specie->name }}</option>@endforeach
					</select>
				</label>
			</div>
			<div class="medium-4 large-4 columns">
				<label>Select Breed
					<select name="breed_id" id="breed" value="{{ Input::old('breed_id') }}" required>
					@foreach($breeds as $breed)<option value="{{ $breed->id }}">{{ $breed->name }}</option>@endforeach
					</select>
				</label>
			</div>
			<div class="medium-4 large-4 columns">
				<label>Select Status
					<select name="status_id" id="statuses" value="{{ Input::old('status_id') }}" required>
						@foreach($statuses as $status)<option value="{{ $status->id }}">{{ $status->name }}</option>@endforeach
					</select>
				</label>
			</div>
		</div>
		<div class="row">
			<div class="medium-8 large-8 columns">
				<label>Description (max 400 chars):
					<textarea class="create-record-description error" name="description" placeholder="Enter Description" value="{{ Input::old('description') }}"></textarea>
					@if ($errors->has('description')) <small class="error input-error-label">{{ $errors->first('description') }}</small> @endif
				</label>
			</div>
			<div class="medium-4 large-4 columns">
				<label>Add more photos (optional):
					<input type="file" name="photo_set[]" id="photo-set" class="button tiny secondary" accept="image/*" value="{{ Input::old('photo_set') }}" multiple>
				</label>
			</div>
		</div>
		<div class="row">
			<div class="medium-12 large-12 columns">
				<a href="{{ URL::to('admin/dashboard') }}"><br><i class="fa fa-chevron-circle-left fa-lg"> Dashboard</i></a>
				{{ Form::submit('Create', ['class'=>'button small right']) }}
				{{ Form::reset('Reset', ['class'=>'button small warning right', 'id'=>'reset-form']) }}
			</div>
		</div>
	{{ Form::close() }}
	<!-- Form Ends -->
@stop

@section('scripts')
	{{ HTML::script('admin/js/admin-create.js') }}
@stop