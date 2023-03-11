<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Middleware\ShareErrorsFromSession;

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

Route::get('home', function () {
    return view('welcome');
});
Route::middleware("auth")->group(function () {
    Route::get('/', [RoomController::class, 'show'])->name('set-all-room');
    Route::post('createroom', [RoomController::class, 'create'])->name('create-room');
    Route::post('addmember', [RoomController::class, 'addMember'])->name('addMember-room');
    Route::post('send', [MessageController::class, 'create'])->name('send-chat');
    Route::get('get', [MessageController::class, 'show'])->name('get-chat');
    Route::delete('deleteRoom', [RoomController::class, 'delete'])->name('delete-room');
    Route::delete('logoutRoom', [RoomController::class, 'logout'])->name('logout-room');
});
Auth::routes();
