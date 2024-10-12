<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;

class EventExample extends Component
{
    public $event;
    public $guest;
    public $User;
    public $selectedEventId;

    public function render()
    {
        return view('livewire.event-example');

    }
    public function updateEvent($selectedEventId)
    {
        $this->event = Event::find($selectedEventId);

    }
     public function updatedSelectedEventId($selectedEventId)
    {
        $this->event = Event::find($selectedEventId);
    }

}
