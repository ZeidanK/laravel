<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserDashboard extends Component
{

    public $user;
    public $events;
    public $numberOfContactRequests;
    public $numberOfGuests;
    public $numberOfGuestsWithErrors;
    public $numberOfGuestsWithoutErrors;
    public $numberOfEvents;
    public $numberOfEventRequests;



    public function mount(){
        $this->user=auth()->user();
        $this->events=$this->user->events;
        $this->numberOfContactRequests=0;
        $this->numberOfGuests=$this->user->guests->count();
        $this->numberOfGuestsWithErrors=$this->user->guests->where('has_error',true)->count();
        $this->numberOfGuestsWithoutErrors=$this->user->guests->where('has_error',false)->count();
        $this->numberOfEvents=$this->user->events->count();
        $this->numberOfEventRequests=0;//$this->user->eventRequests->count();

    }
    public function render()
    {
        return view('livewire.user-dashboard');
    }
}
