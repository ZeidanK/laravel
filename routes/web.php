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
use App\Http\Controllers\Auth\VerificationController;
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
Route::get('/dashboard/eventedit', [DashboardController::class, 'showEventEdit'])->name('dashboard.eventedit');
Route::get('/dashboard/guestedit', [DashboardController::class, 'showGuestEdit'])->name('dashboard.guestedit');
Route::get('/dashboard/admindash', [DashboardController::class, 'showAdminDash'])->name('dashboard.admindash')->middleware('auth');
Route::get('/dashboard/contactus', [DashboardController::class, 'showContactUs'])->name('dashboard.contactus');
Route::get('/dashboard/welcomedash', [DashboardController::class, 'showWelcomeDash'])->name('dashboard.welcomedash');
Route::get('/dashboard/guestdisplay', [DashboardController::class, 'showGuestDisplay'])->name('dashboard.guestdisplay');
Route::get('/dashboard/landingpage', [DashboardController::class, 'showLandingPage'])->name('dashboard.landingpage');





Route::post('/login', [AuthController::class, 'showlogin']);

Route::get('/', [AuthController::class, 'showLogin']);

Route::get('/seed', [DashboardController::class, 'seed']);

Route::get('/guest', [GuestController::class, 'show']);

Route::get('/events/{id}', [EventController::class, 'show']);

Route::post('/events/{id}/update', [EventController::class, 'update'])->name('events.update');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// GET route to display the registration form
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');

// POST route to handle the registration form submission
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/index', [AuthController::class, 'index'])->name('index');
// Route::get('about-laravel', AboutUsController::class);
// Email Verification Routes
Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

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
