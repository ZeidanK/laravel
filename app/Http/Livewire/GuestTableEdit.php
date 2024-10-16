<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Guest;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class GuestTableEdit extends Component
{
    public $guests;
    public $search = '';
    public $isEditing = false;
    public $isAdding = true;
    public $editingGuest;
    public $newGuest = [];
    public $sortField = 'first_name';
    public $sortDirection = 'asc';
    public $event;
    public $isAdmin = false;
    public $showAdminMenu = false;
    public $users;
    public $events;
    public $selectedUser;
    public $selectedEvent;
    public $render=false;

    protected $rules = [
        'editingGuest.first_name' => 'required|string|max:255',
        'editingGuest.last_name' => 'required|string|max:255',
        'editingGuest.phone_number' => 'required|string|max:15',
        'newGuest.first_name' => 'required|string|max:255',
        'newGuest.last_name' => 'required|string|max:255',
        'newGuest.phone_number' => 'required|string|max:15',
    ];

    public function mount($event)
    {
        if($event==null){
            $this->event=Event::first();
        }else{
            $this->render=true;
        //$this->selectedEvent = $event->id;
        $this->isAdmin = Auth::check() && Auth::user()->isAdmin();
        $this->event = $event;
        $this->loadGuests();
        if ($this->isAdmin) {
            //$this->event=Event::find($selectedEvent);
            $this->showAdminMenu = true;
            $this->users = User::all();
            $this->events = Event::all();
        }
    }

    }

    public function loadGuests()
    {
        if ($this->isAdmin) {
            if ($this->selectedEvent == null && $this->selectedUser != null) {
                $this->guests = Guest::where('user_id', $this->selectedUser)
                    ->where('event_id', 1)
                    ->where(function ($query) {
                        $query->where('first_name', 'like', '%' . $this->search . '%')
                            ->orWhere('last_name', 'like', '%' . $this->search . '%')
                            ->orWhere('phone_number', 'like', '%' . $this->search . '%');
                    })
                    ->orderBy($this->sortField, $this->sortDirection)
                    ->get();
                return;
            }

            if ($this->selectedEvent == null) {
                $this->selectedEvent = $this->event->id;
            }

            $this->event = Event::find($this->selectedEvent);
            $this->guests = Guest::where('event_id', $this->event->id)
                ->where(function ($query) {
                    $query->where('first_name', 'like', '%' . $this->search . '%')
                        ->orWhere('last_name', 'like', '%' . $this->search . '%')
                        ->orWhere('phone_number', 'like', '%' . $this->search . '%');
                })
                ->orderBy($this->sortField, $this->sortDirection)
                ->get();
            return;
        } else {
            $this->guests = Guest::where('user_id', Auth::id())
                ->where('event_id', $this->event->id)
                ->where(function ($query) {
                    $query->where('first_name', 'like', '%' . $this->search . '%')
                        ->orWhere('last_name', 'like', '%' . $this->search . '%')
                        ->orWhere('phone_number', 'like', '%' . $this->search . '%');
                })
                ->orderBy($this->sortField, $this->sortDirection)
                ->get();
        }
    }

    public function updatedSearch()
    {
        $this->loadGuests();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
        $this->loadGuests();
    }

    public function editGuest($id)
    {
        $this->isEditing = true;
        $this->isAdding = false;
        $this->editingGuest = Guest::find($id);
    }

    public function saveGuest()
    {
        $this->validate([
            'editingGuest.first_name' => 'required|string|max:255',
            'editingGuest.last_name' => 'required|string|max:255',
            'editingGuest.phone_number' => 'required|string|max:15',
        ]);
        $this->editingGuest->has_error=$this->editingGuest->checkError();
        $this->editingGuest->save();
        $this->loadGuests();
        $this->isEditing = false;
    }

    public function addNewGuest()
    {
        $this->isAdding = true;
        $this->isEditing = false;
        $this->newGuest = [];
    }

    public function saveNewGuest()
    {
        $this->validate([
            'newGuest.first_name' => 'required|string|max:255',
            'newGuest.last_name' => 'required|string|max:255',
            'newGuest.phone_number' => 'required|string|max:15',
        ]);

        $guest = new Guest();
        $guest->first_name = $this->newGuest['first_name'];
        $guest->last_name = $this->newGuest['last_name'];
        $guest->phone_number = $this->newGuest['phone_number'];
        $guest->event_id = $this->event->id;
        $guest->user_id = Auth::id();

        $guest->has_error=$guest->checkError();
        $guest->save();
        $this->loadGuests();
        $this->isAdding = false;
    }

    public function deleteGuest($id)
    {
        Guest::find($id)->delete();
        $this->loadGuests();
    }

    public function cancelEdit()
    {
        $this->isEditing = false;
        $this->editingGuest = null;
    }

    public function toggleAdminMenu()
    {
        $this->showAdminMenu = !$this->showAdminMenu;
    }

    public function updateEvent()
    {

        // Implement the logic to update the event based on selected user and event
        // For example:
        if ($this->selectedUser && $this->selectedEvent) {
            //$user = User::find($this->selectedUser);

            // Perform the update logic here
        }
        $event = Event::find($this->selectedEvent);
        $this->loadGuests();
    }

    public function render()
    {
        if($this->render){
            return view('livewire.guest-table-edit');
        }
    }
}
