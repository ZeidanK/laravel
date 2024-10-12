<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EventExample extends Component
{
    public $selectedEvent = 1; // Default to Event 1
    public $eventId;
    public $event;
    public function render()
    {
        return view('livewire.event-example');
    }
  

    public function setEvent($eventNumber)
    {
        $this->selectedEvent = $eventNumber;
    }
}



