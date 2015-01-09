@extends('admin.master')

@section('styles')
	{{HTML::style('admin/css/admin-create.css')}}
@stop

@section('content')

	<!-- Form Starts -->
	{{ Form::open(array('action' => 'AnimalController@store', 'method'=>'post', 'files'=>true)) }}
		<div class="row">
			<div class="medium-3 large-3 columns">
				<img id="preview-holder" src="#" alt="preview">
				<label>Select Profile Photo (optional):<input type="file" name="profile_photo" id="img-input" class="button tiny secondary" accept="image/*"></label>
			</div>
		</div>
		<div class="row">
			<div class="medium-4 large-4 columns">
				<label>Shelter Code (optional):
					<input type="text" class="error" name="shelter_code" placeholder="shelter code">
					@if ($errors->has('shelter_code')) <span class="error">{{ $errors->first('shelter_code') }}</span> @endif
				</label>
			</div>
		</div>
		<div class="row">
			<div class="medium-6 large-6 columns">
				<label>Animal Name:
					<input type="text" name="name" class="error" placeholder="enter name">
					@if ($errors->has('name')) <span class="error">{{ $errors->first('name') }}</span> @endif
				</label>
			</div>
			<div class="medium-6 large-6 columns">
				<label>Date of Birth (mm/dd/yyyy):
					<input type="text" name="dob" class="error" id="datepicker_dob" placeholder="click to select date" required>
					@if ($errors->has('dob')) <span class="error">{{ $errors->first('dob') }}</span> @endif
				</label>
			</div>
		</div>
		<div class="row">
			<div class="medium-6 large-6 columns">
				<label>Date In (mm/dd/yyyy):
					<input type="text" name="date_in" class="error" id="datepicker_date-in" placeholder="click to select date" required>
					@if ($errors->has('date_in')) <span class="error">{{ $errors->first('date_in') }}</span> @endif
				</label>
			</div>
			<div class="medium-6 large-6 columns">
				<label>Date Out (mm/dd/yyyy - optional):
					<input type="text" name="date_out" class="error" id="datepicker_date-out" placeholder="click to select date">
					@if ($errors->has('date_out')) <span class="error">{{ $errors->first('date_out') }}</span> @endif
				</label>
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
			<div class="medium-8 large-8 columns">
				<label>Description (max 400 chars):
					<textarea class="create-record-description error" name="description" placeholder="Enter Description"></textarea>
					@if ($errors->has('description')) <span class="error">{{ $errors->first('description') }}</span> @endif
				</label>
			</div>
			<div class="medium-4 large-4 columns">
				<label>Add more photos (optional):<input type="file" name="photo_set[]" id="photo-set" class="button tiny secondary" accept="image/*" multiple></label>
			</div>
		</div>
		<div class="row">
			<div class="medium-12 large-12 columns">
				<a href="{{ URL::to('admin/dashboard') }}"><br><i class="fa fa-chevron-circle-left fa-lg"> Dashboard</i></a>
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