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
        'open_link'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }


}