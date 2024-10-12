<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EventEdit extends Component
{
    public $event;
    public $eventId;
    public function render()
    {
        
        return view('livewire.event-edit');
    }
    public function mount(){
        $this->event = \App\Models\Event::find($this->eventId);
}
}
