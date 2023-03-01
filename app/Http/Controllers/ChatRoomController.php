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
        if (Auth::user()->id) {
            $room = $request->all();
            $file = $request->photo->getClientOriginalName();
            $request->photo->move(public_path('storage/profile/'),$file);
            $room['photo'] = $file;
            $room['user_name'] = Auth::user()->name;
            $room = Room::create($room);
            $users_rooms = array('user_name' => $room['user_name'], 'room_id' => $room->id, 'type' => 'admin');
            User_room::create($users_rooms);
            return redirect()->route('set-all-room');
        }
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
            $users_rooms = array('user_name' => $findUser[0]->name, 'room_id' => $request->room_id);
            User_room::create($users_rooms);
            dd("Add");
            return redirect()->route('set-all-room');
        } else {
            dd("User Not Found");
        }
    }
    function setAllRooms(Request $request)
    {
        $rooms = Room::select('user_rooms.*', 'rooms.name','rooms.photo')->join('user_rooms', 'user_rooms.room_id', '=', 'rooms.id')->where('user_rooms.user_name', Auth::user()->name)->get();
        return view('room.chat-room', compact('rooms'));
    }
    function sendChat(Request $request)
    {
        // $findUser = User::where('name', $request->user_name)->get();
        if (Auth::user()->name === $request->user_name) {
            $message = $request->all();
            Message::create($message);
            return $message;
        }
    }
    function getChat(Request $request)
    {
        $chat = Message::select('messages.*')->where('messages.room_id', $request->room_id)->orderBy('messages.id', 'asc')->get();
        return $chat;
    }
}
