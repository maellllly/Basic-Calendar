<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon, Carbon\CarbonInterval;

use Redirect,Response;

use App\Model\Events;

class CalendarController extends Controller
{

	public function index()
	{



		return view('calendar.welcome');
	}

	public function createEvent(Request $request)
	{

		$validator = Validator::make($request->all(), [
			'eventName' => 'required|string',
		    'eventStartDate' => 'required|date',
		    'eventEndDate' => 'required|date|after:start_date',
		    'eventDay' =>'required_without_all	'
		]);

		if ($validator->passes()) {

			Events::where('is_recent', 1)->update(['is_recent' => 0]);

			foreach ($request->eventDay as $key => $eventDay) {

				$startDate = Carbon::parse($request->eventStartDate)->modify($eventDay); 

				$endDate = Carbon::parse($request->eventEndDate);

				for ($date = $startDate; $date->lte($endDate); $date->addWeek()) {
				    $insertEvent = new Events();
				    $insertEvent->event_name = $request->eventName;
				    $insertEvent->event_date = $date->format('Y-m-d');
				    $insertEvent->is_recent = 1;
				    $insertEvent->save();
				}	
			}


			// return response()->json(['success' => 'Added new records.']);
			return Response::json(['success' => true, 'message' => 'Event successfully saved!'], 200);
        }


		return Response::json(array(
		        'success' => false,
		        'errors' => $validator->getMessageBag()->toArray()
	    ), 400); // 400 being the HTTP code for an invalid request.


    	// return response()->json(['error' => $validator->errors()->all()]);
	}

	public function getEvents()
	{
		$temp = Events::where('is_recent', '=', 1)->get();

		$events = [];

		foreach ($temp as $key => $event) {

			$events[] = [
				'title' => $event->event_name,
				'start' => $event->event_date
			];
		}

		return response()->json($events);
	}

}