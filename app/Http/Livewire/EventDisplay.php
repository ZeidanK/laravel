<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;

class EventDisplay extends Component
{
    public $selectedEventId;
    public $event;
    public $guest;
    public $User;
    protected $listeners = ['eventSelected', 'refreshEventDisplay'];

    public function render()
    {
        return view('livewire.event-display');
    }
    public function mount($event,$guest,$user){
        if($event==null){
            $this->event=\App\Models\Event::first();
        }else{
            $this->event=$event;
        }
        if($guest==null){
            $this->guest=\App\Models\Guest::first();
        }else{
            $this->guest=$guest;
        }
        if($user==null){
            $this->user=\App\Models\User::first();
        }else{
            $this->user=$user;
        }

    }
     public function updateEvent($eventId)
    {
        $this->event = Event::find($eventId);
    }
    public function updatedSelectedEventId($eventId)
    {
        $this->event = Event::find($eventId);
    }
    public function eventSelected($eventId)
    {
        $this->event = Event::find($eventId);
        if($this->event==null){
            $this->event=Event::first();
        }
    }
    public function refreshEventDisplay($event)
    {
        $this->event = $event;
    }
}
