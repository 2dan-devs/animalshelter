@extends('admin.master')

@section('styles')
	{{ HTML::style('admin/css/events-edit.css') }}
@stop

@section('content')
	{{ Form::open(['route'=>['admin.dashboard.events.update', $event->id], 'method'=>'PUT']) }}
	<!-- ROW: title, start date, end date. -->
	<div class="row"><br>
		<div class="medium-6 large-6 columns">
			<label>Event Title:
				<input name="title" type="text" class="error" placeholder="Enter event title" value="{{ $event->title }}" required>
				@if ($errors->has('title')) <small class="error input-error-label">{{ $errors->first('title') }}</small> @endif
			</label>
		</div>
		<div class="medium-3 large-3 columns">
			<label>Start Date (mm/dd/yyyy):
				<input type="text" name="start_date" class="error" id="datepicker_start-date" placeholder="click to select date" value="{{ $event->start_date }}" required>
				@if ($errors->has('start_date')) <small class="error input-error-label">{{ $errors->first('start_date') }}</small> @endif
			</label>
		</div>
		<div class="medium-3 large-3 columns end">
			<label>End Date (mm/dd/yyyy):
				<input type="text" name="end_date" class="error" id="datepicker_end-date" placeholder="click to select date" value="{{ $event->end_date }}" required>
				@if ($errors->has('end_date')) <small class="error input-error-label">{{ $errors->first('end_date') }}</small> @endif
			</label>
			<p></p>
		</div>
	</div>
	<!-- ROW: start date, end date. -->
	<div class="panel">
		<div class="row">
			<div class="medium-6 large-6 columns">
				<label>Location Name:
					<input name="location" type="text" class="error" placeholder="Enter location" value="{{ $event->location }}" required>
					@if ($errors->has('location')) <small class="error input-error-label">{{ $errors->first('location') }}</small> @endif
				</label>
			</div>
			<div class="medium-6 large-6 columns">
				<label>Stree Address:
					<input name="address" type="text" class="error" placeholder="Enter street address" value="{{ $event->address }}" required>
					@if ($errors->has('address')) <small class="error input-error-label">{{ $errors->first('address') }}</small> @endif
				</label>
			</div>
		</div>
		<!-- ROW: address zip state city -->
		<div class="row">
			<div class="medium-3 large-3 columns">
				<label>City:
					<input name="city" type="text" class="error" placeholder="Enter city" value="{{ $event->city }}" required>
					@if ($errors->has('city')) <small class="error input-error-label">{{ $errors->first('city') }}</small> @endif
				</label>
			</div>
			<div class="medium-3 large-3 columns">
				<label>State:
					<input type="text" name="state" id="" class="error" placeholder="Enter state" value="{{ $event->state }}" required>
					@if ($errors->has('state')) <small class="error input-error-label">{{ $errors->first('state') }}</small> @endif
				</label>
			</div>
			<div class="medium-3 large-3 columns">
				<label>Zip:
					<input type="text" name="zip" id="" class="error" placeholder="Enter zip code" value="{{ $event->zip }}" required>
					@if ($errors->has('zip')) <small class="error input-error-label">{{ $errors->first('zip') }}</small> @endif
				</label>
			</div>
			<div class="medium-3 large-3 columns">
				<label>Call for More Info:
					<input type="text" name="phone" id="" class="error" placeholder="Enter phone number" value="{{ $event->phone }}" required>
					@if ($errors->has('phone')) <small class="error input-error-label">{{ $errors->first('phone') }}</small> @endif
				</label>
			</div>
		</div>
	</div>
	<!-- ROW: event description -->
	<div class="row">
		<div class="medium-8 large-8 columns">
			<label>Event Description:
				<textarea name="body" id="" class="error textarea-description" placeholder="Enter event details" required>{{ $event->body }}</textarea>
				@if ($errors->has('body')) <small class="error input-error-label">{{ $errors->first('body') }}</small> @endif
			</label>
			<p></p>
		</div>
		<div class="medium-4 large-4 columns">
			<label>Status:
				<select name="active">
					<option value="1" @if ($event->active==1){{'selected'}}@endif>Enabled</option>
					<option value="0" @if ($event->active==0){{'selected'}}@endif>Disabled</option>
				</select>
			</label>
		</div>
	</div>
	<!-- ROW: navigation -->
	<div class="row">
		<div class="medium-12 large-12 columns">
			<a href="{{ URL::to('admin/dashboard/events') }}"><br><i class="fa fa-chevron-circle-left fa-lg"> View All</i></a>
			{{ Form::submit('Update', ['class'=>'button small right']) }}
		</div>
	</div><br>
	{{ Form::close() }}
@stop

@section('scripts')
	{{ HTML::script('admin/js/events-edit.js') }}
@stop