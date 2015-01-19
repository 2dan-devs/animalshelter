@extends('admin.master')

@section('styles')
	{{ HTML::style('admin/css/admin-contactus.css') }}
@stop

@section('content')
	{{ Form::open(['route'=>['admin.dashboard.contactus.update', $contactus->id], 'method'=>'PUT']) }}
	<!-- ################# ROW: Title ####################  -->
	<div class="row">
		<div class="medium-4 large-4 columns">
			<label for="title">Title:
				<input name="title" type="text" value="{{$contactus->title}}">
			</label>
		</div>
	</div>
	<!-- ################# ROW: Adress ####################  -->
	<div class="row">
		<div class="medium-6 large-6 columns">
			<label for="address">Address:
				<input name="address" type="text" value="{{$contactus->address}}">
			</label>
		</div>
	</div>
	<!-- ################# ROW: City, State and Zip ####################  -->
	<div class="row collapse">
		<div class="medium-4 large-4 columns">
			<label for="city">City:
				<input name="city" type="text" value="{{$contactus->city}}">
			</label>
		</div>
		<div class="medium-4 large-4 columns">
			<label for="state">State:
				<input name="state" type="text" value="{{$contactus->state}}">
			</label>
		</div>
		<div class="medium-4 large-4 columns">
			<label for="zip">Zip:
				<input name="zip" type="text" value="{{$contactus->zip}}">
			</label>
		</div>
	</div>
	<!-- ################# ROW: Email 1, Email 2 ####################  -->
	<div class="row">
		<div class="medium-6 large-6 columns">
			<label for="email_1">Email 1:
				<input name="email_1" type="text" value="{{$contactus->email_1}}">
			</label>
		</div>
		<div class="medium-6 large-6 columns">
			<label for="email_2">Email 2:
				<input name="email_2" type="text" value="{{$contactus->email_2}}">
			</label>
		</div>
	</div>
	<!-- ################# ROW: Phone 1, Phone 2 ####################  -->
	<div class="row">
		<div class="medium-6 large-6 columns">
			<label for="phone_1">Phone 1 (xxx-xxx-xxxx):
				<input name="phone_1" type="text" value="{{$contactus->phone_1}}">
			</label>
		</div>
		<div class="medium-6 large-6 columns">
			<label for="phone_2">Phone 2 (xxx-xxx-xxxx):
				<input name="phone_2" type="text" value="{{$contactus->phone_2}}">
			</label>
		</div>
	</div>
	<!-- ################# ROW: back button, update button ####################  -->
	<div class="row">
		<div class="medium-12 large-12 columns">
			<a href="{{ URL::previous() }}"><br><i class="fa fa-chevron-circle-left fa-lg left"> Back</i></a>
			{{ Form::submit('Update', ['class'=>'button radius small right']) }}
		</div>
	</div>
	{{ Form::close() }}
@stop

@section('scripts')
	{{ HTML::script('admin/js/animal-contactus.js') }}
@stop