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
        $room_name =$request['room'];
        return view('room.chat-room', compact('room_name','chat'));
    }
    function sendChat(Request $request)
    {
        $message = $request->all();
        Message::create($message);
        return redirect()->back();
    }
    function getChat(Request $request){
        $chat = Message::where('rooms_name', $request->room_name)->get();
        return $chat;
    }
}
