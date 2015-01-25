@extends('admin.master')

@section('styles')
	{{ HTML::style('admin/css/user-profile.css') }}
@stop

@section('content')
	{{ Form::open(['action'=>['UserController@updateProfile', $user->id]]) }}
	<!-- +++++++++++++++++++++++++++ ROW +++++++++++++++++++++++-->
	<div class="row">
		<div class="medium-4 large-4 large-centered medium-centered columns">
			<label>Username:
				<input type="text" name="username" value="{{ $user->username }}">
			</label>
		</div>
	</div>
	<!-- +++++++++++++++++++++++++++ ROW +++++++++++++++++++++++-->
	<div class="row">
		<div class="medium-4 large-4 large-centered medium-centered columns">
			<label>E-mail:
				<input type="email" name="email" value="{{ $user->email }}">
			</label>
		</div>
	</div>
	<!-- +++++++++++++++++++++++++++ ROW +++++++++++++++++++++++-->
	<div class="row">
		<div class="medium-4 large-4 large-centered medium-centered columns">
			<label>New Password:
				<input type="password" name="password" placeholder="New password">
			</label>
		</div>
	</div>
	<!-- +++++++++++++++++++++++++++ ROW +++++++++++++++++++++++-->
	<div class="row">
		<div class="medium-4 large-4 large-centered medium-centered columns">
			<label>Confirm New Password:
				<input type="password" name="password_confirmation" placeholder="Confirm password">
			</label>
		</div>
	</div>
	<!-- +++++++++++++++++++++++++++ ROW +++++++++++++++++++++++-->
	<div class="row">
		<div class="medium-4 large-4 large-centered medium-centered columns">
			<a href="{{ URL::to('admin/dashboard') }}"><br><i class="fa fa-chevron-circle-left fa-lg"> Cancel</i></a>
			{{ Form::submit('Update', ['class'=>'button tiny right']) }}
		</div>
	</div><br>
	{{ Form::close() }}

@stop

@section('scripts')
	{{ HTML::script('admin/js/user-profile.js') }}
@stop