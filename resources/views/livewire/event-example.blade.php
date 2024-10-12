<div>
    <h2>Select Event</h2>

    <!-- Dropdown to select event -->
    <select wire:model="selectedEvent" class="form-select" wire:change="setEvent($eventId.target.value)">
        <option value="1">Event 1</option>
        <option value="2">Event 2</option>
        <option value="3">Event 3</option>
        <option value="4">Event 4</option>
    </select>

    <div class="mt-4">
        <!-- Conditional rendering of the event display -->
        @if ($selectedEvent == 1)
            <livewire:event-display :eventId="1" />
        @elseif ($selectedEvent == 2)
            <livewire:event-display :eventId="2" />
        @elseif ($selectedEvent == 3)
            <livewire:event-display :eventId="3" />
        @elseif ($selectedEvent == 4)
            <livewire:event-display :eventId="4" />
        @endif
    </div>
</div>
