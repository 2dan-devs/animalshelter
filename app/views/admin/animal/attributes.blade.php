@extends('admin.master')

@section('styles')
	{{ HTML::style('admin/css/animal-attributes.css') }}
@stop

@section('content')
	<div class="row">
		<div class="medium-6 large-4 columns">
			<div class="panel list-panel">
				<div class="list-title-div"><p><b>Status</b></p></div>
				<div class="list-wrap">
					<ul class="square">
						@foreach ($statuses as $status)
							<!-- Open Form to Delete -->
							{{ Form::open(['route' => ['admin.dashboard.status.destroy', $status->id],
								'method' => 'DELETE',
								'onsubmit' => 'return confirm("Are you sure to delete this Status?")']) }}

							<li>{{ $status->name }}
								{{ Form::submit('Remove', array('type'=>'submit', 'class'=>'label secondary')) }}
							</li>

							{{ Form::close() }}
						@endforeach
					</ul>
				</div>
				<div class="row collapse enter-new-section">
					{{ Form::open(['action'=>'StatusController@store', 'method'=>'POST']) }}
				        <div class="small-9 large-9 columns">
				        	<input name="name" type="text" placeholder="Enter New Status" required>
				        </div>
				        <div class="small-3 columns">
				        	{{ Form::submit('Add', ['class'=>'button tiny postfix']) }}
				        </div>
				    {{ Form::close() }}
		      	</div>
			</div>
		</div>
		<div class="medium-6 large-4 columns">
			<div class="panel list-panel">
				<div class="list-title-div"><p><b>Species</b></p></div>
				<div class="list-wrap">
					<ul class="square">
						@foreach ($species as $specie)
							<!-- Open Form to Delete -->
							{{ Form::open(['route' => ['admin.dashboard.species.destroy', $specie->id],
								'method' => 'DELETE',
								'onsubmit' => 'return confirm("Are you sure to delete this Species?")']) }}

							<li>{{ $specie->name }}
								{{ Form::submit('Remove', array('type'=>'submit', 'class'=>'label secondary')) }}
							</li>

							{{ Form::close() }}
						@endforeach
					</ul>
				</div>
				<div class="row collapse enter-new-section">
					{{ Form::open(['action'=>'SpeciesController@store', 'method'=>'POST']) }}
				        <div class="small-9 columns">
				          <input name="name" type="text" placeholder="Enter New Species" required>
				        </div>
				        <div class="small-3 columns">
				        	{{ Form::submit('Add', ['class'=>'button tiny postfix']) }}
				        </div>
				    {{ Form::close() }}
		      	</div>
			</div>
		</div>
		<div class="medium-6 large-4 columns">
			<div class="panel list-panel">
				<div class="list-title-div"><p><b>Breeds</b></p></div>
				<div class="list-wrap-breeds">
					<ul class="square">
						@foreach ($breeds as $breed)
							<!-- Open Form to Delete -->
							{{Form::open(['route' => ['admin.dashboard.breed.destroy', $breed->id], 'method' =>
							'DELETE', 'onsubmit' => 'return confirm("Are you sure to delete this Breed?")']) }}

							<li>{{ $breed->name }}
								{{Form::submit('Remove', array('type'=>'submit','class' => 'label secondary'))}}
							</li>

							{{ Form::close() }}
						@endforeach
					</ul>
				</div>
				<div class="row collapse enter-new-section">
					{{ Form::open(['action'=>'BreedController@store', 'method'=>'POST']) }}
						<div class="large-12 columns">
							<select name="species_id">
								@foreach ($species as $specie)
								<option value="{{ $specie->id }}">{{ $specie->name }}</option>
								@endforeach
							</select>
						</div>
				        <div class="large-9 columns">
				          <input name="name" type="text" placeholder="Enter new breed">
				        </div>
				        <div class="large-3 columns">
				        	{{ Form::submit('Add', ['class'=>'button tiny postfix']) }}
				        </div>
				    {{ Form::close() }}
		      	</div>
			</div>
		</div>
	</div>
@stop

@section('scripts')
	{{ HTML::script('admin/js/animal-attributes.js') }}
@stop