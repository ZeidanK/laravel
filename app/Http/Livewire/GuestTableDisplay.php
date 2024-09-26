<?php

namespace App\Http\Livewire;
use App\Models\Guest;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\GuestsExport;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Response; // Add this line
use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;


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
    public Collection $events;

    public function mount($events)
    {
        $this->events = $events;
        if ($this->events->isNotEmpty()) {
            $this->guests = Guest::where('user_id', $this->events->first()->user_id)
                     ->where('event_id', $this->events->first()->id)
                     ->get();
        } else

        if ($this->guests->isEmpty()) {
            session()->flash('message', 'No guests found for the selected event.');
        }
    }

    protected $listeners = ['guestUpdated' => 'updateGuests'];



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
    public function updatedFilterAttending()
    {
        $this->filterGuests();
    }
    public function updatedFilterNotAttending()
    {
        $this->filterGuests();
    }
    public function updatedFilterNoResponse()
    {
        $this->filterGuests();
    }

    public function filterGuests()
    {
        if ($this->events->isNotEmpty()) {
            $event = $this->events->first();
            $query = Guest::where('user_id', $event->user_id)
                          ->where('event_id', $event->id);

        if ($this->search) {
            $query->where(function($q) {
                $q->where('first_name', 'like', '%' . $this->search . '%')
                  ->orWhere('last_name', 'like', '%' . $this->search . '%')
                  ->orWhere('phone_number', 'like', '%' . $this->search . '%');
            });
        }
        if ($this->filterAttending || $this->filterNotAttending || $this->filterNoResponse) {
            $query->where(function($q) {
            if ($this->filterAttending) {
                $q->where('is_attending', 1);
            }
            if ($this->filterNotAttending) {
                $q->orWhere('is_attending', 0);
            }
            if ($this->filterNoResponse) {
                $q->orWhereNull('is_attending');
            }
            });
        }

        if ($this->filterClickedYes || $this->filterClickedNo) {
            $query->where(function($q) {
            if ($this->filterClickedYes) {
                $q->where('open_link', 1);
            }
            if ($this->filterClickedNo) {
                $q->orWhere('open_link', 0);
            }
            });
        }



        $this->guests = $query->get();
    } else {
        $this->guests = collect(); // No events, no guests
    }
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
    public function downloadFilteredExcel()
    {
        $guests = $this->guests; // Use the currently displayed guests

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the header
        $sheet->setCellValue('A1', 'First Name');
        $sheet->setCellValue('B1', 'Last Name');
        $sheet->setCellValue('C1', 'Phone Number');
        $sheet->setCellValue('D1', 'Is Attending');
        $sheet->setCellValue('E1', 'Open Link');

        // Populate the data
        $row = 2;
        foreach ($guests as $guest) {
            $sheet->setCellValue('A' . $row, $guest->first_name);
            $sheet->setCellValue('B' . $row, $guest->last_name);
            $sheet->setCellValue('C' . $row, $guest->phone_number);
            $sheet->setCellValue('D' . $row, $guest->is_attending ? 'Yes' : 'No');
            $sheet->setCellValue('E' . $row, $guest->open_link ? 'Yes' : 'No');
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'filtered_guests.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($temp_file);

        return Response::download($temp_file, $fileName)->deleteFileAfterSend(true);
    }

    public function downloadFullExcel()
    {
        if ($this->events->isNotEmpty()) {
            $event = $this->events->first();
            $guests = Guest::where('event_id', $event->id)->get();

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Set the header
            $sheet->setCellValue('A1', 'First Name');
            $sheet->setCellValue('B1', 'Last Name');
            $sheet->setCellValue('C1', 'Phone Number');
            $sheet->setCellValue('D1', 'Is Attending');
            $sheet->setCellValue('E1', 'Open Link');

            // Populate the data
            $row = 2;
            foreach ($guests as $guest) {
                $sheet->setCellValue('A' . $row, $guest->first_name);
                $sheet->setCellValue('B' . $row, $guest->last_name);
                $sheet->setCellValue('C' . $row, $guest->phone_number);
                $sheet->setCellValue('D' . $row, $guest->is_attending ? 'Yes' : 'No');
                $sheet->setCellValue('E' . $row, $guest->open_link ? 'Yes' : 'No');
                $row++;
            }

            $writer = new Xlsx($spreadsheet);
            $fileName = 'guests.xlsx';
            $temp_file = tempnam(sys_get_temp_dir(), $fileName);
            $writer->save($temp_file);

            return Response::download($temp_file, $fileName)->deleteFileAfterSend(true);
        } else {
            session()->flash('message', 'No events found.');
            return redirect()->back();
        }
    }


    public function render()
    {
        return view( 'livewire.guest-table-display');
    }
}
