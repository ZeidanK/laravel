<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function list()
    {
        return view('events');
    }
    public function create()
    {
        return view('create_event');
    }

    public function store(Request $request)
    {
        $event = new \App\Models\Event();
        $event->event_slug = $request->event_slug;
        $event->event_name = $request->event_name;
        $event->event_date = $request->event_date;
        $event->event_time = $request->event_time;
        $event->event_location = $request->event_location;
        $event->event_description = $request->event_description;
        $event->save();
        return redirect('/events');
    }

}
