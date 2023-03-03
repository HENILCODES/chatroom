<?php

use App\Http\Controllers\ChatRoomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
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
    Route::post('createroom', [ChatRoomController::class, 'createRoom'])->name('create-room');
    Route::post('addmember', [ChatRoomController::class, 'addMember'])->name('addMember-room')->middleware('checkUser');
    Route::get('/', [ChatRoomController::class, 'setAllRooms'])->name('set-all-room');
    Route::post('send', [ChatRoomController::class, 'sendChat'])->name('send-chat');
    Route::post('get', [ChatRoomController::class, 'getChat'])->name('get-chat');
    Route::delete('deleteRoom', [ChatRoomController::class, 'deleteRoom'])->name('delete-room');
    Route::delete('logoutRoom', [ChatRoomController::class, 'logoutRoom'])->name('logout-room');
});
Auth::routes();
Route::resource("student", StudentController::class);