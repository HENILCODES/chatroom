<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class ChatRoomController extends Controller
{
    //
    public function createRoom(Request $request)
    {
        $room = $request->only('name');
        // dd($room);
        Room::create($room);
        return redirect()->route('set-chat-room',compact('room'));
    }

    function setChatRoom(Request $request){
        $room = $request['room']['name'];
        // dd($room);
        return redirect()->route('chat-room',compact('room'));
    }

    function chatRoom(Request $request){
        dd($request);
    }
}
