<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;
use Livewire\WithFileUploads;

class EventEdit extends Component
{
public $event;
    public $guest;
    public $User;
    public $selectedEventId;



    use WithFileUploads;

    public $user;

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
    public $numberOfEvents;
    public $eventDate;
    public $eventName;




    public function mount($event=null){
        if($event==null){
            $this->event=\App\Models\Event::first();
        }else{
            $this->event=$event;
        }
        $this->user = auth()->user();
        $this->events = Event::where('user_id', $this->user->id)->get();
        $this->numberOfEvents=$this->events->count();
    }
    public function render()
    {
        return view('livewire.event-edit')->with('event', $this->event);

    }
    // public function updateEvent($selectedEventId)
    // {
    //     $this->event = Event::find($selectedEventId);

    // }
    //  public function updatedSelectedEventId($selectedEventId)
    // {
    //     $this->event = Event::find($selectedEventId);
    // }

    public function createEvent(){
        //return redirect()->route('create_event');
        if($this->events->count() > 4){
            session()->flash('error', 'You have reached the maximum number of events allowed.');
            return;
        }
        $newEvent = new Event();
        $newEvent->user_id = $this->user->id;
        $newEvent->event_slug = 'new-event-' . uniqid();
        $newEvent->event_name = 'New Event';
        $newEvent->event_date = now();
        $newEvent->event_time = now();
        $newEvent->save();
        $this->events = Event::where('user_id', $this->user->id)->get();
    }




















    protected $listeners = ['refreshEventDisplay' => 'refreshEventDisplay'];

    // public function mount()
    // {
    //     $this->user = auth()->user();
    //     $this->events = Event::where('user_id', $this->user->id)->get();
    //     if ($this->events->isNotEmpty()) {
    //         //dd($this->events->last()->id);
    //         $this->loadEvent($this->events->first()->id);
    //     }
    // }

    // public function render()
    // {

    //     return view('livewire.event-edit');
    // }

    public function updatedSelectedEventId($eventId)
    {

        //dd($eventId);
        $this->eventSelected($eventId);
    }

    public function eventSelected($eventId)
    {
        $this->loadEvent($eventId);
    }

    public function loadEvent($eventId)
    {
        $this->event = Event::find($eventId);
        if ($this->event) {
            //dd($this->event);
            $this->selectedEventId = $eventId;
            $this->rsvpOption = $this->event->rsvp;
            $this->description = $this->event->event_description;
            $this->mapOption = $this->event->location;
            $this->countdownOption = $this->event->countdown;
            $this->countdownSelect = $this->event->countdown_option;
            $this->gif = $this->event->Gif;
            $this->gifSelect = $this->event->GifSelect;
            $this->bgColor = $this->event->background_color;
            $this->eventName = $this->event->event_name;
            $this->eventDate = $this->event->countdown_date;
            //$this->emit('refreshEventDisplay', $this->event);
            $this->emit('updateEvent', $this->event->id);
            //dd($this->event);
        }
    }

    public function buttonClicked(){
        dd($this->eventDate);
    }
    public function updatedEventName()
    {
        $this->event->update(['event_name' => $this->eventName]);
        $this->emit('refreshEventDisplay', $this->event->id);
    }

    public function updatedEventDate()
    {
        $this->event->update(['event_date' => $this->eventDate]);
        $this->event->update(['countdown_time' => $this->eventDate]);
        $this->emit('refreshEventDisplay', $this->event->id);
        //dd($this->event->countdown_time, $this->eventDate);
    }
    public function updatedRsvpOption()
    {
        $this->event->update(['rsvp' => $this->rsvpOption]);
        $this->emit('refreshEventDisplay', $this->event->id);
    }

    public function updatedDescription()
    {
        $this->event->update(['event_description' => $this->description]);
        $this->emit('refreshEventDisplay', $this->event->id);
                    $this->emit('updateEvent', $this->event->id);

    }

    public function updatedMapOption()
    {
        $this->event->update(['location' => $this->mapOption ]);
        $this->emit('refreshEventDisplay', $this->event->id);
       // dd($this->event->location);
    }


    public function updatedCountdownOption()
    {
        $this->event->update(['countdown' => $this->countdownOption]);
        $this->emit('refreshEventDisplay', $this->event->id);
        $this->emit('updateEvent', $this->event->id);
        $this->emit('countdownToggled');
    }

    public function updatedCountdownSelect()
    {
        $this->event->update(['countdown_option' => $this->countdownSelect]);
        $this->emit('refreshEventDisplay', $this->event->id);
    }

    public function updatedGif()
    {
        $this->event->update(['Gif' => $this->gif]);
        $this->emit('refreshEventDisplay', $this->event->id);
    }

    public function updatedGifSelect()
    {
        $this->event->update(['GifSelect' => $this->gifSelect]);
        $this->emit('refreshEventDisplay', $this->event->id);
    }

    public function updatedBgColor()
    {
        $this->event->update(['background_color' => $this->bgColor]);
        $this->emit('refreshEventDisplay', $this->event->id);
                $this->emit('updateEvent', $this->event->id);

        //dd($this->event->background_color, $this->bgColor);
    }

    public function updateEvent()
    {

        $this->validate([
            'description' => 'required|string|max:255',
            //'bgColor' => 'required|string|max:7',
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
            'event_name' => $this->eventName,
            'countdown_time' => $this->eventDate,
            dd($this->event->background_color)
        ]);

        if ($this->eventImage) {
            $this->uploadImage();
        }

        session()->flash('message', 'Event updated successfully.');
        $this->emit('refreshEventDisplay', $this->event->id);
    }
    public function uploadImage()
    {
        $this->validate([
            'eventImage' => 'image|max:5024', // 5MB Max
        ]);

        if ($this->eventImage) {
            $imageBlob = file_get_contents($this->eventImage->getRealPath());
            $this->event->update(['event_image' => $imageBlob]);
            $this->emit('refreshEventDisplay', $this->event->id);
            //dd($this->eventImage);
        }

    }

    public function refreshEventDisplay($eventId)
    {
        //dd($event);
        $this->event = Event::find($eventId);
        $this->loadEvent($this->selectedEventId);
    }
}
