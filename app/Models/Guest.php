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
        'rsvp',
        'user_id',
        'has_error'
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
    public function checkError()
    {
        $this->has_error = false;

        // Check if first name is empty or contains numbers
        if (empty($this->first_name) || preg_match('/\d/', $this->first_name)) {
            $this->has_error = true;
        }

        // Check if last name is empty or contains numbers
        if (empty($this->last_name) || preg_match('/\d/', $this->last_name)) {
            $this->has_error = true;
        }

        // Check if phone number is empty, contains non-numeric characters, or is not between 9 and 12 digits long
        if (empty($this->phone_number) || !preg_match('/^\d{9,12}$/', $this->phone_number)) {
            $this->has_error = true;
        }

        return $this->has_error;
    }

}
