<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Event;

class EventController extends Controller
{
    public function store(Request $request)
    {
    	if ($request->key == 'ad-"ad3ca')
    	{
    		$e = new Event();
    		$e->name = $request->name;
    		$e->value = $request->has('value') ? $request->value : null;
    		$e->useragent = $request->useragent;
    		$e->user = $request->has('user') ? $request->user : null;
    		$e->save();

    		return response()->json([
			    'status' => 200,
			]);
    	}
    	else
    	{
    		return response()->json([
			    'status' => 401,
			]);
    	}
    }

    public function index()
    {
    	// show last 10 events
    	$events = Event::orderBy('created_at', 'desc')->paginate(10);

    	echo '<h2>Events</h2></br>';
    	foreach ($events as $event)
    	{
    		echo $event->name . ' | ' . $event->user . ' | ' . $event->created_at;
    		echo '</br>';
    	}
    }
}
