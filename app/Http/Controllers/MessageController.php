<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    //
    function show(Request $request)
    {
        $chat = Message::select('messages.*', 'users.photo', 'users.name as user_name')->join('users', 'users.id', '=', 'messages.user_id')->where('messages.room_id', $request->room_id)->orderBy('messages.id', 'asc')->get();
        // $room = Room::find(30);
        // $message = $room->messages->toArray();
        // $user = $room->users->toArray();
        // dump($message, $user);
        // $room_message_user = Room::with('users','messages')->where('id',30)->get();
        // dd($room_message_user->toArray());
        return $chat;
    }

    function create(Request $request)
    {
        if (Auth::user()->id == $request->user_id) {
            $message = $request->all();
            Message::create($message);
            return $message;
        }
    }
}
