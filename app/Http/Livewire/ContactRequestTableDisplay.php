<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ContactRequest;

class ContactRequestTableDisplay extends Component
{
    public $contactRequests;
    public $search = [
        'name' => '',
        'email' => '',
        'phone' => '',
        'is_resolved' => '',

    ];

    public function mount(){
        $this->contactRequests = auth()->user()->role == 'admin' ? ContactRequest::all() : null;
    }

    public function render()
    {
        if($this->contactRequests == null){
            return e('You are not authorized to view this page');
        } else {
            return view('livewire.contact-request-table-display', [
                'contactRequests' => $this->filterContactRequests()
            ]);
        }
    }

    public function deleteContactRequest($id){
        ContactRequest::destroy($id);
        $this->contactRequests = $this->filterContactRequests();
    }

    public function resolveContactRequest($id){
        $contactRequest = ContactRequest::find($id);
        $contactRequest->resolve();
        $this->contactRequests = $this->filterContactRequests();
    }

    public function filter()
    {
        $this->contactRequests = $this->filterContactRequests();
    }

    protected function filterContactRequests()
    {
        $query = ContactRequest::query();

        if ($this->search['name']) {
            $query->where('name', 'like', '%' . $this->search['name'] . '%');
        }

        if ($this->search['email']) {
            $query->where('email', 'like', '%' . $this->search['email'] . '%');
        }

        if ($this->search['phone']) {
            $query->where('phone', 'like', '%' . $this->search['phone'] . '%');
        }

        if ($this->search['is_resolved'] !== '') {
            $query->where('is_resolved', $this->search['is_resolved']);
        }

        return $query->get();
    }
}
