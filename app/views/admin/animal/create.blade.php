@extends('admin.master')

@section('content')

	<form>
	{{ Form::open(array('url' => 'admin/animal/store')) }}
		<div class="row">
			<div class="large-12 columns">
				<label>Input Label <input type="text" placeholder="large-12.columns" /></label>
			</div>
		</div>
		<div class="row">
			<div class="large-4 columns">
				<label>Input Label <input type="text" placeholder="large-4.columns" /> </label>
			</div>
			<div class="large-4 columns">
				<label>Input Label <input type="text" placeholder="large-4.columns" /> </label>
			</div>
			<div class="large-4 columns">
				<label>Input Label <input type="text" placeholder="large-4.columns" /> </label>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<label>Select Specie
					{{ Form::select('specie_id', $species)}}
				</label>
				<label>Select Breed
					<select>
						<option value="husker">-</option>
						<option value="husker">Husker</option>
						<option value="starbuck">Starbuck</option>
						<option value="hotdog">Hot Dog</option>
						<option value="apollo">Apollo</option>
					</select>
				</label>
			</div>
		</div>
		<div class="row">
			<div class="large-6 columns">
				<label>Choose Your Favorite</label>
				<input type="radio" name="pokemon" value="Red" id="pokemonRed"><label for="pokemonRed">Red</label>
				<input type="radio" name="pokemon" value="Blue" id="pokemonBlue"><label for="pokemonBlue">Blue</label>
			</div>
			<div class="large-6 columns">
				<label>Check these out</label>
				<input id="checkbox1" type="checkbox"><label for="checkbox1">Checkbox 1</label>
				<input id="checkbox2" type="checkbox"><label for="checkbox2">Checkbox 2</label>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<label>Description: <textarea placeholder="Enter Description"></textarea></label>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				{{HTML::link('/admin/dashboard', 'Back', array('class'=>'button small secondary left'));}}
				{{Form::submit('Create', array('class'=>'button small right'));}}
				{{Form::reset('Reset', array('class'=>'button small secondary right'));}}
			</div>
		</div>
	{{ Form::close() }}
	</form>

@stop