<?php

use App\Http\Controllers\ChatRoomController;
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

Route::get('/', function () {
    return view('welcome');
});
// Route::prefix('user')->group(function () {

//     Route::controller(UserController::class)->group(function () {

//         Route::get('login', 'login')->name('user-login');
//         Route::get('signup', 'signup')->name('user-signup');

//         Route::post('store', 'store')->name('user-store');
//         Route::post('check', 'check')->name('user-check');
//     });
// });

Route::post('createroom', [ChatRoomController::class, 'createRoom'])->name('create-room');
Route::post('joinroom', [ChatRoomController::class, 'joinRoom'])->name('join-room');

Route::middleware("auth")->group(function () {
    Route::get('chatroom/{room}', [ChatRoomController::class, 'setChatRoom'])->name('set-chat-room');
    Route::post('send', [ChatRoomController::class, 'sendChat'])->name('send-chat');
    Route::post('get', [ChatRoomController::class, 'getChat'])->name('get-chat');
});
Auth::routes();
Route::get('/test',function(){
    return view('test');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
