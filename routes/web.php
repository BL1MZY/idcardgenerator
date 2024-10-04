<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PDFController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Passwords\Confirm;
use App\Livewire\Auth\Passwords\Email;
use App\Livewire\Auth\Passwords\Reset;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Verify;
use App\Livewire\CompleteRegistration;
use App\Livewire\Dashboard;
use App\Livewire\Preview;
use App\Livewire\Record;
use App\Livewire\Index as IndexPage;
use Illuminate\Support\Facades\Route;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;




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

Route::get('/',IndexPage::class)->name('home');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});


Route::get('/my-dashboard', CompleteRegistration::class)->name('complete')->middleware('auth');
Route::get('/dashboard', Dashboard::class)->name('dashboard');
Route::get('/record/{slug}', Record::class)->name('record');
Route::get('/preview', Preview::class)->name('preview');
Route::get('/generate-pdf', [PDFController::class, 'generatePDF'])->name('generate.pdf');
Route::get('/front', [ImageController::class, 'front'])->name('front');
Route::get('/back', [ImageController::class, 'back'])->name('back');


// Route::get('/id-card-pdf', function () {
//     $html = view('id_card')->render(); // Replace 'id-card' with your view name

//     return PDF::loadHTML($html)->download('id_card.pdf');
// });