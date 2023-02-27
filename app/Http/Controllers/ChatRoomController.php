<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChatRoomRequest;
use App\Models\Message;
use App\Models\Room;
use App\Models\User_room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatRoomController extends Controller
{
    public function createRoom(ChatRoomRequest $request)
    {
        $room = Room::create($request->all());
        $users_rooms = array('user_id' => $room->user_id, 'room_id' => $room->id, 'type' => 'admin');
        User_room::create($users_rooms);
        return redirect()->route('set-chat-room');
    }

    public function deleteRoom(Request $request)
    {
        User_room::where('user_id', Auth::user()->id)->where('room_id', $request->room_id)->delete();
        Room::find($request->room_id)->delete();
        return redirect()->back();
    }

    public function addMember(Request $request)
    {
        $users_rooms = array('user_id' => $request->user_id, 'room_id' => $request->room_id, 'type' => 'member');
        User_room::create($users_rooms);
        return redirect()->route('set-chat-room');
    }

    function setChatRoom(Request $request)
    {
        $rooms = Room::select('user_rooms.*', 'rooms.name')->join('user_rooms', 'user_rooms.room_id', '=', 'rooms.id')->get();
        return view('room.chat-room', compact('rooms'));
    }
    function sendChat(Request $request)
    {
        $message = $request->all();
        Message::create($message);
        return $message;
    }

    function getChat(Request $request)
    {
        $chat = Message::select('messages.*', 'users.name as sender')->join('users', 'users.id', '=', 'messages.user_id')->where('messages.room_id', $request->room_id)->orderBy('messages.id', 'asc')->get();
        return $chat;
    }
}
