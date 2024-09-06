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
        'event_status'];

}
