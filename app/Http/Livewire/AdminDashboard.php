<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Event;
use App\Models\ContactRequest;


class AdminDashboard extends Component
{
    public $users;
    public $events;
    public $numberOfUsers;
    public $numberOfEvents;
    public $contactRequests;
    public $numberOfPendingEvents;
    public $numberOfActiveEvents;
    public $numberOfCompletedEvents;
    public $numberOfCancelledEvents;
    public $numberOfNewEvents;


    public function mount(){
        if(auth()->user()->isAdmin()){
            $this->users=User::all();
            $this->events=Event::all();
            $this->numberOfUsers=$this->users->count();
            $this->numberOfEvents=$this->events->count();
            $this->contactRequests=ContactRequest::all()->count();
            $this->numberOfPendingEvents=Event::where('status','pending')->count();
            $this->numberOfActiveEvents=Event::where('status','active')->count();
            $this->numberOfCompletedEvents=Event::where('status','completed')->count();
            $this->numberOfCancelledEvents=Event::where('status','cancelled')->count();
            $this->numberOfNewEvents=Event::where('status','new')->count();




        }
    }
    public function render()
    {
        return view('livewire.admin-dashboard');
    }
}
