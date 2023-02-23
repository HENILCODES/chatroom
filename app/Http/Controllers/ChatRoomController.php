<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChatRoomRequest;
use App\Models\Message;
use App\Models\Room;
use Illuminate\Http\Request;

class ChatRoomController extends Controller
{
    public function createRoom(ChatRoomRequest $request)
    {
        $room = $request->all();
        Room::create($room);
        return redirect()->route('set-chat-room', ['room' => $room['name']]);
    }

    public function joinRoom(Request $request)
    {
        $room = $request->all();
        return redirect()->route('set-chat-room', ['room' => $room['name']]);
    }

    function setChatRoom(Request $request)
    {
        $room_name = $request['room'];
        if (Room::where('name', $room_name)->count() == 1) {
            return view('room.chat-room', compact('room_name'));
        } else {
            return redirect()->back();
        }
    }
    function sendChat(Request $request)
    {
        $message = $request->all();
        Message::create($message);
        return $message;
    }

    function getChat(Request $request)
    {
        $chat = Message::select('messages.*', 'users.name as sender')->join('users', 'users.id', '=', 'messages.users_id')->where('messages.rooms_name', $request->room_name)->orderBy('messages.id','asc')->get();
        return $chat;
    }
}
