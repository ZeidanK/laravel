<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    //
    public function list()
    {
        return view('events');
    }
    public function show(){
        return view('event_test');
    }
    public function create()
    {
        return view('create_event');
    }

    public function store(Request $request)
    {
        $event = new Event();
        $event->event_slug = $request->event_slug;
        $event->event_name = $request->event_name;
        $event->event_date = $request->event_date;
        $event->event_time = $request->event_time;
        $event->event_location = $request->event_location;
        $event->event_description = $request->event_description;
        $event->save();
        return redirect('/events');
    }
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'eventImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120', // Increase max size to 5MB
            'bgColor' => 'required|string',
        ]);

        // Find the event by ID
        $event = Event::find($id);

        // Check if the event exists
        if (!$event) {
            return redirect()->back()->with('error', 'Event not found');
        }

        // Handle the file upload
        if ($request->hasFile('eventImage')) {
            $image = $request->file('eventImage');
            $imageBlob = file_get_contents($image->getRealPath());
            $event->event_image = $imageBlob;
        }

        // Update the background color
        $event->background_color = $request->input('bgColor');

        // Update the event fields
        $event->rsvp = $request->has('rsvpOption') ? 1 : 0;
        $event->location = $request->has('mapOption') ? 1 : 0;
        $event->countdown = $request->has('countdownOption') ? 1 : 0;
        $event->countdown_option = $request->input('countdownSelect');
        //$event->date=$request->input('timeoption');
        // Save the event
        $event->save();

        return redirect()->back()->with('success', 'Event updated successfully');
    }

}
