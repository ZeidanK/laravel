<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EventEdit extends Component
{
    public $event;
    public function render()
    {
        
        return view('livewire.event-edit');
    }
    public function mount(){
        $this->event = \App\Models\Event::find(1);
}
}
