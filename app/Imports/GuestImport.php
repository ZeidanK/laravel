<?php

namespace App\Imports;
use App\Models\Guest;
use App\Models\Event;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class GuestImport implements ToCollection
{

    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        dd("test");
        foreach ($collection as $row) {
           Guest::create([
               'first_name' => $row[0],
               'last_name' => $row[1],
               'phone_number' => $row[2],
               'event_id' => $event->id,
               'user_id' => auth()->id(),
               'guest_slug' => $row[0],
           ]);
        }
    }
}
