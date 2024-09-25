<?php
// namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AboutUsController;
 use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\EventController;
use App\Http\Livewire\Counter;
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
Route::get('/dashboard', [DashboardController::class, '__invoke']);

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [AuthController::class, 'show']);

Route::get('/seed', [DashboardController::class, 'seed']);

Route::get('/guest', [GuestController::class, 'show']);

Route::get('/events/{id}', [EventController::class, 'show']);

Route::post('/events/{id}/update', [EventController::class, 'update'])->name('events.update');

//Route::get('/counter', [Counter::class, 'render']);
Route::get('/{word}/{id}', function ($word, $id) {
    if (preg_match('/\p{Arabic}/u', $word)) {
        // Check if the ID is valid (you can add your own validation logic here)
        if (is_numeric($id)) {
            return "The word is in Arabic and the ID is valid: $id";
        } else {
            return "The word is in Arabic but the ID is not valid.";
        }
    } else {
        return "The word is not in Arabic.";
    }
});












// Route::get('about-laravel', AboutUsController::class);


// Route::get('about-us', function () {

//     return 'about-us';
// });

// Route::get('/welcome', function () {
//     return view('welcome');
// });
// Route::get('/admin_dash', function () {
//     return view('admin_dash');
// });
Route::get('/dbconn',function(){
    return view('dbconn');
});


//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
