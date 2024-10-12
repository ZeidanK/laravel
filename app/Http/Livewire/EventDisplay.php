<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EventDisplay extends Component
{
    
    public $event;
    public $guest;
    public $User;
    public $eventId;

   
    
    public function mount(){
$this->event = \App\Models\Event::find($this->eventId);
$this->guest = \App\Models\Guest::find(1);
$this->user = \App\Models\user::find(1);

    }

    public function render()
    {
        return view('livewire.event-display', ['eventId' => $this->eventId]);
    }
}
