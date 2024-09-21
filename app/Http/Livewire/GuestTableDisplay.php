<?php

namespace App\Http\Livewire;
use App\Models\Guest;
use Livewire\Component;

class GuestTableDisplay extends Component
{
    public $guests;
    public $search = '';
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
        $this->guests = Guest::where('first_name', 'like', '%' . $this->search . '%')
            ->orWhere('last_name', 'like', '%' . $this->search . '%')
            ->orWhere('phone_number', 'like', '%' . $this->search . '%')
            ->get();
    }

    public function sortTable()
    {
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        $this->guests = Guest::orderBy('first_name', $this->sortDirection)->get();
    }

    public function render()
    {
        return view('livewire.guest-table-display');
    }
}
