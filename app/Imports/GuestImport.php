<?php

namespace App\Imports;
use App\Models\Guest;
use App\Models\Event;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Log;

class GuestImport implements ToCollection
{
    protected $event_id;
    protected $user_id;

    public function __construct($event_id, $user_id)
    {
        $this->event_id = $event_id;
        $this->user_id = $user_id;
    }

    public function collection(Collection $collection)
    {
        $isFirstRow = true;
        foreach ($collection as $row) {
            if ($isFirstRow) {
            $isFirstRow = false;
            continue;
            }
            Log::info('Creating guest with event_id: ' . $this->event_id . ' and user_id: ' . $this->user_id);
            Guest::create([
            'first_name' => $row[0],
            'last_name' => $row[1],
            'phone_number' => $row[2],
            'event_id' => $this->event_id,
            'user_id' => $this->user_id,
            'guest_slug' => $row[0],
            ]);
        }
    }
}
