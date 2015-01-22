<?php

class EventsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$events = ShelterEvent::paginate(10);

		return View::make('admin.events.index', ['events'=>$events])->with('title', 'Shelter Events');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.events.create')->with('title', 'Create Event');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$val = ShelterEvent::validate($input);

		if ( $val->fails() )
		{
			return Redirect::back()->withErrors($val)->withInput();
		}

		$event = new ShelterEvent;
		$event->title = Input::get('title');
		$event->start_date = Input::get('start_date');
		$event->end_date = Input::get('end_date');

		$event->location = Input::get('location');
		$event->address = Input::get('address');
		$event->city = Input::get('city');
		$event->state = Input::get('state');
		$event->zip = Input::get('zip');

		$event->body = Input::get('body');
		$event->save();

		return Redirect::back()
				->with('message', FlashMessage::DisplayAlert('Event created successfully!', 'success'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$event = ShelterEvent::find($id);

		return View::make('admin.events.edit', ['event'=>$event])
					->with('title', 'Edit Event');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();

		$val = ShelterEvent::validate($input);

		if ( $val->fails() )
		{
			return Redirect::back()->withErrors($val)->withInput();
		}

		$event = ShelterEvent::find($id);
		$event->title = Input::get('title');
		$event->start_date = Input::get('start_date');
		$event->end_date = Input::get('end_date');

		$event->location = Input::get('location');
		$event->address = Input::get('address');
		$event->city = Input::get('city');
		$event->state = Input::get('state');
		$event->zip = Input::get('zip');

		$event->body = Input::get('body');
		$event->save();

		return Redirect::back()
				->with('message', FlashMessage::DisplayAlert('Event Updated successfully!', 'success'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$event = ShelterEvent::find($id);

		if ( $event )
		{
			$event->delete();

			return Redirect::back()->with('message',
				FlashMessage::DisplayAlert('Event deleted successfully!', 'success'));
		}

	}

}
