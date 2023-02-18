<?php

use App\Http\Controllers\ChatRoomController;
use App\Http\Controllers\UserController;
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

Route::resource('user', UserController::class);

Route::post('createroom', [ChatRoomController::class, 'createRoom'])->name('create-room');
Route::post('joinroom', [ChatRoomController::class, 'joinRoom'])->name('join-room');

Route::get('chatroom/{room}', [ChatRoomController::class, 'setChatRoom'])->name('set-chat-room');

Route::post('send',[ChatRoomController::class,'sendChat'])->name('send-chat');
Route::post('get',[ChatRoomController::class,'getChat'])->name('get-chat');

