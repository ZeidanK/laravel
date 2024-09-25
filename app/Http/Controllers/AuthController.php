<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function show()
    {
        return view('welcome');
    }

    public function login(){



        validator(request()->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        if(auth()->attempt(request()->only('email', 'password'))){
            return redirect('/dashboard');
        }
        return redirect()->back()->withErrors([
            'message' => 'Wrong credentials please try again'
        ]);
        echo "login";

    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
