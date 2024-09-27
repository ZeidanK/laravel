<?php

namespace App\Http\Controllers;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Http\Request;
use App\Models\Event;

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
    public function showGuestEdit(){
        return view('dashboard.guest_edit');
    }
    public function showAdminDash(){
        return view('dashboard.admin_dash');
    }
    public function showEventEdit(){
        return view('event_test');
    }
    public function showContactUs(){
        return view('dashboard.contact_us');
    }
    public function showWelcomeDash(){
        return view('dashboard.welcome_dash');
    }
    public function showGuestDisplay(){
        return view('dashboard.guest_display');
    }


}
