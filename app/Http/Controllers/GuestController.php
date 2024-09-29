<?php

namespace App\Http\Controllers;
use App\Imports\GuestImport;
use Log;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\Guest;

class GuestController extends Controller
{
    //
    public function show(){
        return view('event_test2');
    }
    public function list()
    {
        return view('event_test2');
    }

    public function create()
    {
        return view('create-guest');
    }

    public function store(Request $request)
    {
        $guest = new Guest();
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
        $guest = Guest::find($id);
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
    public function importExcelData(Request $request)
    {
        Log::info('Importing Excel data');
        // Validate the request
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);
        Log::info('Request validated');

        // Get the file from the request
        $file = $request->file('file');
        Log::info('File retrieved: ' . $file->getClientOriginalName());
        // Read the file and import the data
        Excel::import(new GuestImport, $file,$request->event_id);
        Log::info('Excel data imported');
        // Redirect or return a response
        return redirect('/guests')->with('status', 'Guests imported successfully!');
    }
}
