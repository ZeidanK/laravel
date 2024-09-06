<?php

namespace App\Http\Controllers;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    // public function index()
    // {
    //     return view('admin_dash');
    // }
    public function __invoke(){
        return view('admin_dash',[
            'user'=>auth()->user()
        ]);
    }

    
}
