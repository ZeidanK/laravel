<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Guest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'guest_slug',
        'event_id',
        'first_name',
        'last_name',
        'phone_number',
        'is_attending',
        'notes',
        'open_link',
        'rsvp'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    static public function createTestGuest()
    {
        $guest = new \App\Models\Guest();
        $guest->guest_slug = 'test-guest';
        $guest->event_id = 1;
        $guest->first_name = 'Test';
        $guest->last_name = 'Guest';
        $guest->phone_number = '123-456-7890';
        $guest->is_attending = 1;
        $guest->notes = 'Test notes';
        $guest->open_link = 'test-link';
        //$guest->save();
        return $guest;
        //return redirect('/guests');
    }

}
