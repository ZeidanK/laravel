<?php

namespace App\Http\Livewire;
use App\Models\ContactRequest as ContactRequestModel;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class ContactRequest extends Component
{
    public $name;
    public $phone;
    public $email;
    public $message;

    protected $rules = [
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'email' => 'required|email|max:255',
        'message' => 'required|string|max:500',
    ];

    public function submit()
    {
        $this->validate();

        //Handle the form submission, e.g., send an email
        Mail::raw($this->message, function ($message) {
            $message->to('da3wah@da3wa.org')
                    ->subject('Contact Request from ' . $this->name)
                    ->from('da3wah@da3wa.org', $this->name) // Use an authorized email address
                    ->replyTo($this->email); // Set the reply-to address to the user's email
        });

        ContactRequestModel::create([
            'name' => $this->name,
            'phone_number' => $this->phone,
            'email' => $this->email,
            'message' => $this->message,
            'ip_address' => request()->ip(),
            'user_agent' => request()->header('User-Agent'),
        ]);

        // Optionally, reset the form fields
        $this->reset(['name', 'phone', 'email', 'message']);

        // Optionally, add a success message
        session()->flash('message', 'Your contact request has been sent successfully.');
    }

    public function render()
    {
        return view('livewire.contact-request');
    }
}
