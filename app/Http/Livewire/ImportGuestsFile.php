<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Guest;

class ImportGuestsFile extends Component
{
    public $event;
    public $user;
    public $file;

    public function render()
    {

        return view('livewire.import-guests-file');
    }
    public function mount($event)
    {
        $this->event = $event;

        $this->user = auth()->user();
    }

    public function import()
    {
        $this->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        Excel::import(new class($this->event) implements \Maatwebsite\Excel\Concerns\ToModel {
            private $event;

            public function __construct($event)
            {
                $this->event = $event;
            }

            public function model(array $row)
            {
                return new Guest([
                    'first_name' => $row[0],
                    'last_name' => $row[1],
                    'phone_number' => $row[2],
                    'event_id' => $this->event->id,
                    'user_id' => auth()->id(),

                ]);
            }
        }, $this->file->path());

        $this->emit('guestsImported');
    }

}
