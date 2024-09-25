<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'event_slug',
        'event_name',
        'event_date',
        'event_time',
        'event_location',
        'event_description',
        'event_image',
        'event_link',
        'event_status',
        'rsvp'
    ];

        static public function createTestEvent()
    {
        $event = new \App\Models\Event();
        $event->event_slug = 'test-event';
        $event->event_name = 'Test Event';
        $event->event_date = '2021-12-31';
        $event->event_time = '12:00:00';
        $event->event_location = 'Test Location';
        $event->event_description = 'Test Description';
        $event->rsvp=true;
        //$event->save();
        return $event;
        //return redirect('/events');
    }
    public function guests()
    {
        return $this->hasMany(Guest::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getEventDateAttribute($value)
    {
        return date('m/d/Y', strtotime($value));
    }

}
