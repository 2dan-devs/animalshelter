<?php

class StatusController extends \BaseController {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if ( !empty(Input::get('name')) )
		{
			$val = Status::validate(Input::all());

			if ($val->fails())
			{
				return Redirect::back()->withErrors($val);
			}

			try {
				$status = new Status;
				$status->name = Input::get('name');
				$status->save();
			} catch (Exception $e) {
				return Redirect::back()->with('message', FlashMessage::DisplayAlert('Status can NOT be created. Already exists.', 'alert'));
			}

			return Redirect::back()->with('message', FlashMessage::DisplayAlert('Status Created Successfully!', 'success'));
		}

		return Redirect::back()->with('message', FlashMessage::DisplayAlert('Enter a valid status name.', 'alert'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$status = Status::find($id);

		if ($status)
		{
			try {
				// Delete breed, if not possible, catch error.
				$status->delete();
			} catch (Exception $e) {
				// If breed to be deleted is in use, send nice error back to admin.
				return Redirect::back()->with('message', FlashMessage::DisplayAlert('Status can NOT be deleted because it\'s in use.', 'alert'));
			}
			return Redirect::back()->with('message', FlashMessage::DisplayAlert('Status Deleted Successfully!', 'success'));
		}

		return Redirect::back()->with('message', FlashMessage::DisplayAlert('Record Not Found.', 'alert'));
	}
}