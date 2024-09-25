<?php
// namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
Route::get('/gif-select', function () {
    return view('gif_select');
});
// use App\Http\Controllers\AboutUsController;
 use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\EventController;
// routes/web.php



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

Route::get('/', [AuthController::class, 'show']);

Route::get('/seed', [DashboardController::class, 'seed']);

Route::get('/guest', [GuestController::class, 'show']);

Route::get('/events/{id}', [EventController::class, 'show']);

Route::post('/events/{id}/update', [EventController::class, 'update'])->name('events.update');













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
// Route::get('/dbconn',function(){
//     return view('dbconn');
// });


//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
