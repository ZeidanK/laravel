<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\GuestImport;

class ImportGuestsFile extends Component
{
    use WithFileUploads;

    public $file;
    public $event;
    public $user;

    public function mount($event)
    {
        $this->user = auth()->user();
        $this->event = $event;

    }

    public function importfile()
    {
        try {
            $this->validate([
                'file' => 'required|mimes:xlsx,xls,csv'
            ]);

            // Debugging statement to check if the file is being uploaded
            if ($this->file) {
                Log::info('File uploaded: ' . $this->file->getClientOriginalName());
            } else {
                Log::error('File not uploaded');
            }
            Log::info('Event ID: ' . $this->event->id);
            Log::info('Importing Excel data');
        // Validate the request


        // Get the file from the request

        Log::info('File retrieved: ' . $this->file->getClientOriginalName());
        // Read the file and import the data
        Excel::import(new GuestImport(1, $this->user->id), $this->file->getRealPath());
        Log::info('Excel data imported');

            Log::info('Simplified HTTP request completed');


        } catch (\Exception $e) {
            session()->flash('error', 'Error importing guests: ' . $e->getMessage());
            Log::error('Import error: ' . $e->getMessage());
            dd($e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.import-guests-file');
    }
}
