<?php

namespace App\Http\Livewire;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class UserRegister extends Component
{
    public $email;
    public $password;
    public $password_confirmation;
    public $name;
    public $phone_number=1;

    protected $rules = [
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8|confirmed',
        'name' => 'required|string|max:255',

    ];

    public function render()
    {
        return view('livewire.user-register');
    }


    public function register()
    {
        Log::info('Registering user: ' . $this->email);
        $this->validate();

        try {
            $user = User::create([
                'email' => $this->email,
                'password' => bcrypt($this->password),
                'name' => $this->name,
                'phone_number' => $this->phone_number,
            ]);
            Log::info('User registered: ' . $user->email);

            auth()->login($user);
            return redirect('/dashboard');
        } catch (\Exception $e) {
            Log::error('User registration failed: ' . $e->getMessage());
            session()->flash('error', 'Registration failed. Please try again.');
            return redirect()->back();
        }
    }


}
