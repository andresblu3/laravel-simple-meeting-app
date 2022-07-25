<?php

use App\Http\Controllers\DashboardConroller;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\MeetingController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardConroller::class, 'dashboard'])->middleware(['auth'])->name('dashboard');


Route::resource('meetings', MeetingController::class)->except(['index'])->middleware(['auth']);

Route::get('meetings/add_guest/{meeting}', [MeetingController::class, 'add_guest'])->middleware(['auth'])->name('add_guest');
Route::post('meetings/add_guest/{meeting}', [MeetingController::class, 'add_guest'])->middleware(['auth'])->name('save_guest');
Route::delete('meetings/add_guest/{meeting}/{guest}', [MeetingController::class, 'destroy_guest'])->middleware(['auth'])->name('delete_guest');

Route::get('meetings/add_file/{meeting}', [MeetingController::class, 'add_file'])->middleware(['auth'])->name('add_file');
Route::post('meetings/save_file/{meeting}', [MeetingController::class, 'save_file'])->middleware(['auth'])->name('save_file');
Route::delete('meetings/delete_file/{meeting}/{file}', [MeetingController::class, 'delete_file'])->middleware(['auth'])->name('delete_file');

require __DIR__ . '/auth.php';
