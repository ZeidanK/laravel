<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;
use Livewire\WithFileUploads;

class EventEdit extends Component
{
    use WithFileUploads;

    public $user;
    public $selectedEventId;
    public $event;
    public $eventImage;
    public $rsvpOption;
    public $description;
    public $mapOption;
    public $countdownOption;
    public $countdownSelect;
    public $gif;
    public $gifSelect;
    public $bgColor;
    public $events;

    protected $listeners = ['eventSelected'];

    public function mount()
    {
        $this->user = auth()->user();
        $this->events = Event::where('user_id', $this->user->id)->get();
        if ($this->events->isNotEmpty()) {
            $this->loadEvent($this->events->first()->id);
        }
    }

    public function render()
    {
        return view('livewire.event-edit');
    }

    public function eventSelected($eventId)
    {
        $this->event = Event::find($eventId);
        $this->selectedEventId = $eventId;
        $this->loadEvent($eventId);
    }

    public function loadEvent($eventId)
    {
        $this->event = Event::find($eventId);
        if ($this->event) {
            $this->selectedEventId = $eventId;
            $this->rsvpOption = $this->event->rsvp;
            $this->description = $this->event->event_description;
            $this->mapOption = $this->event->location;
            $this->countdownOption = $this->event->countdown;
            $this->countdownSelect = $this->event->countdown_option;
            $this->gif = $this->event->Gif;
            $this->gifSelect = $this->event->GifSelect;
            $this->bgColor = $this->event->background_color;
        }
                $this->emit('refreshEventDisplay', $this->event);

    }

    public function updateEvent()
    {
        $this->validate([
            'description' => 'required|string|max:255',
            'bgColor' => 'required|string|max:7',
        ]);

        $this->event->update([
            'event_description' => $this->description,
            'background_color' => $this->bgColor,
            'rsvp' => $this->rsvpOption,
            'location' => $this->mapOption,
            'countdown' => $this->countdownOption,
            'countdown_option' => $this->countdownSelect,
            'Gif' => $this->gif,
            'GifSelect' => $this->gifSelect,
        ]);

        if ($this->eventImage) {
            $path = $this->eventImage->store('event_images', 'public');
            $this->event->update(['event_image_path' => $path]);
        }

        session()->flash('message', 'Event updated successfully.');
        $this->emit('refreshEventDisplay', $this->event);
    }
    public function refreshEvent()
    {


            $this->loadEvent($this->selectedEventId);

    }
}
