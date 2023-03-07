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
            $request->photo->move(public_path('storage/profile/room/'), $file);
            $room['photo'] = $file;
            $room['user_id'] = Auth::user()->id;
            $room = Room::create($room);
            $users_rooms = array('user_id' => $room['user_id'], 'room_id' => $room->id, 'type' => 'admin');
            User_room::create($users_rooms);
            return redirect()->route('set-all-room');
        }
    }
    public function deleteRoom(Request $request)
    {
        User_room::where('room_id', $request->room_id)->delete();
        Room::find($request->room_id)->delete();
        return redirect()->back();
    }
    public function logoutRoom(Request $request)
    {
        User_room::where('user_id', Auth::user()->id)->where('room_id', $request->room_id)->delete();
        return redirect()->back();
    }
    public function addMember(Request $request)
    {
        $findUser = User::where('name', $request->name)->get();
        if ($findUser->count() == 1) {
            $CheckRoom = User_room::where('user_id', $findUser[0]->id)->where('room_id', $request->room_id)->first();
            if (empty($CheckRoom)) {
                $users_room = array('user_id' => $findUser[0]->id, 'room_id' => $request->room_id);
                User_room::create($users_room);
                return redirect()->route('set-all-room');
            } else {
                return "<h1>Alredy Added</h1>";
            }
        } else {
            return "<h1> User Not Found</h1>";
        }
    }
    function setAllRooms(Request $request)
    {
        $rooms = Room::select('user_rooms.*', 'rooms.name', 'rooms.photo')->join('user_rooms', 'user_rooms.room_id', '=', 'rooms.id')->where('user_rooms.user_id', Auth::user()->id)->get();
        return view('room.chat-room', compact('rooms'));
    }
    function sendChat(Request $request)
    {
        if (Auth::user()->id == $request->user_id) {
            $message = $request->all();
            Message::create($message);
            return $message;
        }
    }
    function getChat(Request $request)
    {
        $chat = Message::select('messages.*', 'users.photo', 'users.name as user_name')->join('users', 'users.id', '=', 'messages.user_id')->where('messages.room_id', $request->room_id)->orderBy('messages.id', 'asc')->get();
        return $chat;
    }
}
