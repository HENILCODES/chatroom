<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Room;
use Illuminate\Http\Request;

class ChatRoomController extends Controller
{
    public function createRoom(Request $request)
    {
        $room = $request->all();
        Room::create($room);
        return redirect()->route('set-chat-room', ['room' => $room['name']]);
    }

    function setChatRoom(Request $request)
    {
        $room_id = Room::where('name', [$request['room']])->first()->id;
        return view('room.chat-room', compact('room_id'));
    }
    function sendChat(Request $request)
    {
        $message = $request->all();
        Message::create($message);
        return "Send";
    }
    function getChat(Request $request)
    {
        $chat = Message::where('rooms_id', $request->room_id)->get();
        return $chat;
    }
}
