<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChatRoomRequest;
use App\Models\Message;
use App\Models\Room;
use App\Models\User;
use App\Models\User_room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatRoomController extends Controller
{
    public function createRoom(ChatRoomRequest $request)
    {
        $room = $request->all();
        $room['user_name'] = Auth::user()->name;
        $room = Room::create($room);
        $users_rooms = array('user_name' => $room['user_name'], 'room_id' => $room->id, 'type' => 'admin');
        User_room::create($users_rooms);
        return redirect()->route('set-chat-room');
    }
    public function deleteRoom(Request $request)
    {
        User_room::where('user_name', Auth::user()->name)->where('room_id', $request->room_id)->delete();
        Room::find($request->room_id)->delete();
        return redirect()->back();
    }
    public function logoutRoom(Request $request)
    {
        User_room::where('user_name', Auth::user()->name)->where('room_id', $request->room_id)->delete();
        return redirect()->back();
    }
    public function addMember(Request $request)
    {
        $findUser = User::where('name', $request->name)->get();
        if ($findUser->count() == 1) {
            $users_rooms = array('user_name' => $request->name, 'room_id' => $request->room_id);
            User_room::create($users_rooms);
        } else {
            dd("User Not Found");
        }
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
        $chat = Message::select('messages.*')->where('messages.room_id', $request->room_id)->orderBy('messages.id', 'asc')->get();
        return $chat;
    }
}
