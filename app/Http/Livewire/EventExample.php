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

    public function mount($event=null){
        if($event==null){
            $this->event=\App\Models\Event::first();
        }else{
            $this->event=$event;
        }
    }
    public function render()
    {
        return view('livewire.event-example')->with('event', $this->event);

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
