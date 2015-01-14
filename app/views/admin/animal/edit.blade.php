@extends('admin.master')

@section('styles')
	{{ HTML::style('admin/css/animal-update.css') }}
@stop

@section('content')

	<!-- Form Starts -->
	{{ Form::open(array('route' => array('admin.dashboard.animal.update', $animal->id), 'method'=>'PUT', 'files'=>true)) }}
		<div class="row">
			<div class="medium-4 large-4 column">
				{{ HTML::image($animal->profile_photo, 'profile photo', ['id' => 'preview-holder']) }}
			</div>
		</div>
		<div class="row">
			<div class="medium-4 large-4 columns">
				<label>Select Profile Photo (optional):
					<input type="file" name="profile_photo" id="img-input" class="button tiny secondary" accept="image/*">
				</label>
			</div>
			<div class="medium-4 large-4 columns">
				<label>Add more photos (optional):
					<input type="file" name="photo_set[]" id="photo-set" class="button tiny secondary" accept="image/*" value="{{ Input::old('photo_set') }}" multiple>
				</label>
			</div>
		</div>
		<div class="row">
			<div class="medium-6 large-6 columns">
				<label>Pet Name:
					<input type="text" name="name" class="error" placeholder="enter name" value="{{ $animal->name }}">
					@if ($errors->has('name')) <small class="error input-error-label">{{ $errors->first('name') }}</small> @endif
				</label>
			</div>
			<div class="medium-6 large-6 columns">
				<label>Shelter Code (optional):
					<input type="text" class="error" name="shelter_code" placeholder="shelter code" value="{{ $animal->shelter_code }}">
					@if ($errors->has('shelter_code')) <small class="error input-error-label">{{ $errors->first('shelter_code') }}</small> @endif
				</label>
			</div>
		</div>
		<div class="row">
			<div class="medium-4 large-4 columns">
				<label>Date of Birth (mm/dd/yyyy):
					<input type="text" name="dob" class="error" id="datepicker_dob" placeholder="click to select date" value="{{ $animal->dob }}" required>
					@if ($errors->has('dob')) <small class="error input-error-label">{{ $errors->first('dob') }}</small> @endif
				</label>
			</div>
			<div class="medium-4 large-4 columns">
				<label>Date In (mm/dd/yyyy):
					<input type="text" name="date_in" class="error" id="datepicker_date-in" placeholder="click to select date" value="{{ $animal->date_in }}" required>
					@if ($errors->has('date_in')) <small class="error input-error-label">{{ $errors->first('date_in') }}</small> @endif
				</label>
			</div>
			<div class="medium-4 large-4 columns">
				<label>Date Out (mm/dd/yyyy - optional):
					<input type="text" name="date_out" class="error" id="datepicker_date-out" placeholder="click to select date" value="{{ $animal->date_out }}">
					@if ($errors->has('date_out')) <small class="error input-error-label">{{ $errors->first('date_out') }}</small> @endif
				</label>
			</div>
		</div>
		<div class="row">
			<div class="medium-4 large-4 columns">
				<label>Select Species
					{{ Form::select('species_id', $species, $animal->species_id, ['id'=>'species']) }}
				</label>
			</div>
			<div class="medium-4 large-4 columns">
				<label>Select Breed
					{{ Form::select('breed_id', $breeds, $animal->breed_id, ['id'=>'breed']) }}
				</label>
			</div>
			<div class="medium-4 large-4 columns">
				<label>Select Status
					{{ Form::select('status_id', $statuses, $animal->status_id) }}
				</label>
			</div>
		</div>
		<div class="row">
			<div class="medium-6 large-6 columns">
				<label>Pet Description:
					<textarea class="create-record-description error" name="description" placeholder="Enter Description">{{ $animal->description }}</textarea>
					@if ($errors->has('description')) <small class="error input-error-label">{{ $errors->first('description') }}</small> @endif
				</label>
			</div>
			<div class="medium-6 large-6 columns">
				<label>Comments (For Internal Use Only):
					<textarea class="create-record-description error" name="comments" placeholder="Enter Comments">{{ $animal->comments }}</textarea>
					@if ($errors->has('comments')) <small class="error input-error-label">{{ $errors->first('comments') }}</small> @endif
				</label>
			</div>
		</div>
		<div class="row"><br>
			<div class="medium-12 large-12 columns">
				@foreach ($animal->animalPhoto as $photo)
				<div class="left">
					<label for="" class="alert label mark-to-delete-label">Check to Delete:</label>
					<div>
						{{ Form::checkbox('deletePhoto[]', $photo->id) }}
						{{ HTML::image($photo->image_path, 'photo', ['class'=>'photo-set-previews']) }}
					</div>
				</div>
				@endforeach
			</div>
		</div>
		<div class="row">
			<div class="medium-12 large-12 columns">
				<a href="{{ URL::previous() }}"><br><i class="fa fa-chevron-circle-left fa-lg"> Back</i></a>
				{{ Form::submit('Update Record', ['class'=>'button small right']) }}
			</div>
		</div>
	{{ Form::close() }}
	<!-- Form Ends -->
@stop

@section('scripts')
	{{ HTML::script('admin/js/animal-update.js') }}
@stop