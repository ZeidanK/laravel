<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EventDisplay extends Component
{
    
    public $event;
    public $guest;
    public $User;
    public function render()
    {
        return view('livewire.event-display');
    }
    public function mount(){
$this->event = \App\Models\Event::find(1);
$this->guest = \App\Models\Guest::find(1);
$this->user = \App\Models\user::find(1);

    }
}
