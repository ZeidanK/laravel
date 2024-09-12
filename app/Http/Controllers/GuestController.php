<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    //
    public function show(){
        return view('event_test');
    }
    public function list()
    {
        return view('event_test');
    }

    public function create()
    {
        return view('create-guest');
    }

    public function store(Request $request)
    {
        $guest = new \App\Models\Guest();
        $guest->guest_slug = $request->guest_slug;
        $guest->event_id = $request->event_id;
        $guest->first_name = $request->first_name;
        $guest->last_name = $request->last_name;
        $guest->phone_number = $request->phone_number;
        $guest->is_attending = $request->is_attending;
        $guest->notes = $request->notes;
        $guest->open_link = $request->open_link;
        $guest->save();
        return redirect('/guests');
    }



    public function edit($id)
    {
        $guest = \App\Models\Guest::find($id);
        return view('edit-guest', ['guest' => $guest]);
    }
    public function rsvp(Request $request, $id)
    {
        // Retrieve the guest by ID
        $guest = Guest::find($id);

        // Check if the guest exists
        if (!$guest) {
            return response()->json(['message' => 'Guest not found'], 404);
        }

        // Update the guest's RSVP status
        $guest->is_attending = $request->is_attending;
        $guest->save();

        // Redirect or return a response
        return redirect('/guests')->with('status', 'RSVP updated successfully!');
    }
}
