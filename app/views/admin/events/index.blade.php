@extends('admin.master')

@section('styles')
	{{ HTML::style('admin/css/events-index.css') }}
@stop

@section('content')
	<!-- ROW ############################################# -->
	<div class="row">
		<div class="medium-3 large-3 columns">
			<a href="{{ URL::to('admin/dashboard/events/create') }}" class="button radius small">New Event</a>
		</div>
	</div>
	<!-- ROW ############################################## -->
	<div class="row">
		<div class="medium-12 large-12 columns">
			<table>
				<thead>
				    <tr>
				      <th width="150">Event Title</th>
				      <th width="100">Start Date</th>
				      <th width="100">End Date</th>
				      <th width="80">Status</th>
				      <th width="140">Location</th>
				      <th width="180">Address</th>
				    </tr>
			  	</thead>
			  	<tbody>
			  	@foreach ($events as $event)
			    <tr>
			      <td>{{ $event->title }}</td>
			      <td>{{ $event->start_date }}</td>
			      <td>{{ $event->end_date }}</td>
			      <td>@if ($event->active == 1) <p class="label success">Enabled</p> @else <p class="label alert">Disabled</p> @endif</td>
			      <td>{{ $event->location }}</td>
			      <td>{{ $event->address }}</td>
			      <td><a href="{{ URL::to('admin/dashboard/events/' .$event->id. '/edit') }}" class="button tiny radius">Update</a></td>
			      <td>
			      	{{ Form::open(['method'=>'DELETE', 'route'=>['admin.dashboard.events.destroy', $event->id],
						'onsubmit' => 'return confirm("This action is NOT reversible. Are you sure to delete this event?")']) }}
					{{ Form::submit('Delete', array('type' => 'submit', 'class' => 'button tiny radius alert')) }}
					{{ Form::close() }}
			      </td>
			    </tr>
			    @endforeach
			  	</tbody>
			</table>
		</div>
	</div>
	<!-- ######## ROW ############## -->
	<div class="row">
		<div class="medium-12 large-12 columns">
			<a href="{{URL::to('admin/dashboard')}}"><br><i class="fa fa-chevron-circle-left fa-lg left"> Dashboard</i></a>
		</div>
	</div><br><br>

@stop

@section('scripts')
	{{ HTML::script('admin/js/events-index.js') }}
@stop