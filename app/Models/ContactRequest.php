<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'message',
        'is_resolved',
        'resolved_at',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'is_resolved' => 'boolean',
        'resolved_at' => 'datetime',
    ];

    public function resolve()
    {
        $this->is_resolved = true;
        $this->resolved_at = now();
        $this->save();
    }

    public function scopeUnresolved($query)
    {
        return $query->where('is_resolved', false);
    }

    public function scopeResolved($query)
    {
        return $query->where('is_resolved', true);
    }

    public function scopeLatest($query)
    {
        return $query->latest();
    }

    public function scopeOldest($query)
    {
        return $query->oldest();
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', "%$search%")
            ->orWhere('email', 'like', "%$search%")
            ->orWhere('phone_number', 'like', "%$search%")
            ->orWhere('message', 'like', "%$search%");
    }

    public function sort($query, $sort)
    {
        if ($sort === 'latest') {
            return $query->latest();
        } elseif ($sort === 'oldest') {
            return $query->oldest();
        } else {
            return $query;
        }
    }

    public function filterQuery($query, $search, $sort)
    {
        return $query->search($search)->sort($sort);
    }

    public function filterQueryNotResolved($query){
        return $query->unresolved();
    }

    public function filterQueryResolved($query){
        return $query->resolved();
    }


}
