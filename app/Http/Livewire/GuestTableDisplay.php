<?php

namespace App\Http\Livewire;
use App\Models\Guest;
use Livewire\Component;

class GuestTableDisplay extends Component
{
    public $guests;
    public $search = '';
    public $filterClickedYes = true;
    public $filterClickedNo = true;
    public $filterAttending = true;
    public $filterNotAttending = true;
    public $filterNoResponse = true;
    public $sortField = 'first_name'; // Default sort field
    public $sortDirection = 'asc';

    protected $listeners = ['guestUpdated' => 'updateGuests'];

    public function mount()
    {
        $this->guests = Guest::all();
    }

    public function updateGuests($guests)
    {
        $this->guests = $guests;
    }

    public function updatedSearch()
    {
        $this->filterGuests();
    }

    public function updatedFilterClickedYes()
    {
        $this->filterGuests();
    }

    public function updatedFilterClickedNo()
    {
        $this->filterGuests();
    }

    public function filterGuests()
    {
        $query = Guest::query();

        if ($this->search) {
            $query->where(function($q) {
                $q->where('first_name', 'like', '%' . $this->search . '%')
                  ->orWhere('last_name', 'like', '%' . $this->search . '%')
                  ->orWhere('phone_number', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->filterClickedYes && !$this->filterClickedNo) {
            $query->where('open_link', 1);
        } elseif (!$this->filterClickedYes && $this->filterClickedNo) {
            $query->where('open_link', 0);
        }
        if ($this->filterAttending && !$this->filterNotAttending && !$this->filterNoResponse) {
            $query->where('attending', 1);
        } elseif (!$this->filterAttending && $this->filterNotAttending && !$this->filterNoResponse) {
            $query->where('attending', 0);
        } elseif (!$this->filterAttending && !$this->filterNotAttending && $this->filterNoResponse) {
            $query->where('attending', null);
        }

        $this->guests = $query->get();
    }

    public function sortTable()
    {
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        $this->guests = Guest::orderBy('first_name', $this->sortDirection)->get();
    }
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
        $this->filterGuests();
    }

    public function render()
    {
        return view( 'livewire.guest-table-display');
    }
}
