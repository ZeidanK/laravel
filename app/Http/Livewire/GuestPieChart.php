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
    public $numberOfGuestsOpenLink;
    public $numberOfGuestsNotOpenLink;
    public $render = false;

    public function mount($events)
    {
        if($events==null){
            //$this->events = Event::first();
        }else{
            $this->render = true;

        $this->events = $events;
        $this->emitChartData();
        if (!empty($this->events) && isset($this->events[0])) {
            $this->numberOfGuestsAttending = $this->events[0]->getNumberOfGuestsAttending();
            $this->numberOfGuestsNotAttending = $this->events[0]->getNumberOfGuestsNotAttending();
            $this->numberOfGuestsNotResponded = $this->events[0]->getNumberOfGuestsNotResponded();
            $this->numberOfGuests = $this->events[0]->getNumberOfGuests();
            $this->numberOfGuestsOpenLink = $this->events[0]->getNumberOfGuestsOpenLink();
            $this->numberOfGuestsNotOpenLink = $this->events[0]->getNumberOfGuestsNotOpenLink();
        } else {
            // Handle the case where $this->events is empty or does not contain index 0
            $this->numberOfGuestsAttending = 0;
            $this->numberOfGuestsNotAttending = 0;
            $this->numberOfGuestsNotResponded = 0;
            $this->numberOfGuests = 0;
            $this->numberOfGuestsOpenLink = 0;
            $this->numberOfGuestsNotOpenLink = 0;
        }
        }
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
        if($this->render){
            $this->chartData = $this->getChartDataProperty();
        $this->emitChartData();
        return view('livewire.guest-pie-chart');
        }else{//return a message if there are no events "no events found"
            return view('livewire.user-register');}

    }
}
