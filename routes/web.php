<?php

use App\Http\Controllers\ChatRoomController;
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

Route::post('createroom', [ChatRoomController::class, 'createRoom'])->name('create-room');

Route::get('setchatroom', [ChatRoomController::class, 'setChatRoom'])->name('set-chat-room');

Route::get('chatroom/{room}', [ChatRoomController::class, 'chatRoom'])->name('chat-room');
