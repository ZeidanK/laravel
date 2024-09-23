<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;

class GuestPieChart extends Component
{
    public $events;
    public $chartData;
    public $numberOfGuestsAttending;
    public $numberOfGuestsNotAttending;
    public $numberOfGuestsNotResponded;
    public $numberOfGuestOpenLink;
    public $numberOfGuests;

    public function mount($events)
    {
        $this->events = $events;
        $this->emitChartData();
        $this->numberOfGuestsAttending = $this->events[0]->getNumberOfGuestsAttending();
        $this->numberOfGuestsNotAttending =  $this->events[0]->getNumberOfGuestsNotAttending();
        $this->numberOfGuestsNotResponded = $this->events[0]->getNumberOfGuestsNotResponded();
        $this->numberOfGuests = $this->events[0]->getNumberOfGuests();
    }


    public function getChartDataProperty()
    {
        $totalGuests = $this->events[0]->getNumberOfGuests();
        $data = collect([
            'حاضر' => $this->events[0]->getNumberOfGuestsAttending(),
            'غير حاضر' => $this->events[0]->getNumberOfGuestsNotAttending(),
            'لم يرد' => $this->events[0]->getNumberOfGuestsNotResponded()
        ]);
        return $data->map(function($value, $label) use ($totalGuests) {
            $percentage = $totalGuests > 0 ? round(($value / $totalGuests) * 100, 2) : 0;
            return [
                'value' => $value,
                'label' => "{$label} - {$value} ({$percentage}%)"
            ];
        })->values();
    }

    public function emitChartData()
    {

        $this->emit('guestPieChartData', $this->chartData);
        // Debug statement
       // logger('Emitting chart data:', $this->chartData->toArray());
    }

    public function render()
    {
        $this->chartData = $this->getChartDataProperty();
        $this->emitChartData();
        return view('livewire.guest-pie-chart');
    }
}
