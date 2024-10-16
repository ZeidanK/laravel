<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;

class EventDisplay extends Component
{
    public $selectedEventId;
    public $event;
    public $guest;
    public $user;
    protected $listeners = [
        'eventSelected' => 'eventSelected',
        'refreshEventDisplay' => 'refreshEventDisplay',
        'updateEvent' => 'refreshEventDisplay'
    ];

    public function render()
    {
        return view('livewire.event-display')->with('event', $this->event);
    }

    public function mount($event = null, $guest = null, $user = null)
    {
        $this->event = $event ?? Event::first();
        $this->guest = $guest ?? \App\Models\Guest::first();
        $this->user = $user ?? \App\Models\User::first();
    }

    public function updateEvent($eventId)
    {
        $this->event = Event::find($eventId);
        $this->dispatchBrowserEvent('applyStyles');
    }

    public function updatedSelectedEventId($eventId)
    {
        $this->event = Event::find($eventId);
        $this->dispatchBrowserEvent('applyStyles');
    }

    public function eventSelected($eventId)
    {
        //dd("eventSelected");
        $this->event = Event::find($eventId);
        if ($this->event == null) {
            $this->event = Event::first();
        }
        $this->dispatchBrowserEvent('applyStyles');
        $this->emit('eventSwitched', $this->event->id, $this->event->event_date, $this->event->countdown_option);
//dd($this->event->event_date);
    }

    public function refreshEventDisplay($eventId)
    {
        //dd("refreshEventDisplay");
        $this->event = Event::find($eventId);
        if ($this->event == null) {
            $this->event = Event::first();
        }
        $this->dispatchBrowserEvent('applyStyles');
        $this->emit('eventSwitched', $this->event->id, $this->event->event_date, $this->event->countdown_option);
        //dd($this->event);
    }

    // public function render()
    // {
    //     return view('livewire.event-display', ['eventId' => $this->eventId]);
    // }
}
