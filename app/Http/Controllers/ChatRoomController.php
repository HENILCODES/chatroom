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
        $room = Room::where('name', [$request['room']])->first();

        $chat = Message::where('rooms_id', $room->id)->get();
        // dd($chat);
        return view('room.chat-room', compact('chat'));
    }
    function sendChat(Request $request){
        $message =$request->except('_token');
        Message::create($message);
        return redirect()->back();
    }
}
