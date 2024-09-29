<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function show()
    {
        return view('welcome');
    }

    public function showLogin()
    {
        return view('Auth/login');
    }

    public function dashboard()
    {
        return view('dashboard.welcome_dash'); // Ensure you have a 'admin_dash.blade.php' file in the 'resources/views' directory
    }

    public function login()
    {
        validator(request()->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        if(auth()->attempt(request()->only('email', 'password'))){
            return redirect('/dashboard');
        }
    }

    // Add the registration method here
    public function registration()
    {
        return view('Auth/register'); // Ensure you have a 'registration.blade.php' file in the 'resources/views/Auth' directory
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
    public function registerlive()
    {
        return view('livewire.user-register');
    }
    public function showRegistrationForm()
    {
        return view('auth.register'); // Ensure you have a 'register.blade.php' file in the 'resources/views/auth' directory
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Use Hash::make instead of bcrypt
        ]);

        auth()->login($user);

        return redirect('/dashboard');
    }
    public function index()
    {
        return view('auth.verify'); // Ensure you have an 'index.blade.php' file in the 'resources/views/auth' directory
    }


}
