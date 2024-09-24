<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ContactRequest;

class ContactRequestTableDisplay extends Component
{
    public $contactRequests;

    public function mount(){
        $this->contactRequests = ContactRequest::all();
    }
    public function render()
    {
        return view('livewire.contact-request-table-display');
    }
}
