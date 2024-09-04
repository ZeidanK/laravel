<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutUsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('about-laravel', AboutUsController::class);  


Route::get('about-us', function () {
    
    return 'about-us';
});

Route::get('/', function () {
    // $user= \App\Models\User::create([
    //     'name' => 'John Doe',
    //     'email' => 'test@email.com',
    //     'password' => \Illuminate\Support\Facades\Hash::make('password')]);
    // return user;
    $Guest = \App\Models\Guest::create([
        'guest_slug' => 'test-guest',
        'event_id' => 1,
        'first_name' => 'Test',
        'last_name' => 'Guest',
        'phone_number' => '123-456-7890',
        'is_attending' => True,
        'notes' => 'Test notes',
        'open_link' => TRUE
    ]);
    return $Guest;
    //dump(\App\Models\User::all());
});
Route::get('/admin_dash', function () {
    return view('admin_dash');
});
Route::get('/dbconn',function(){
    return view('dbconn');
});
 
