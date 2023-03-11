<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
        ]);
        if (Auth::user()->id) {
            $room = $request->all();
            $file = $request->photo->getClientOriginalName();
            $request->photo->move(public_path('storage/profile/room/'), $file);
            $room['photo'] = $file;
            $details = Room::create($room);

            $room = Room::find($details->id);
            $room->users()->attach(Auth::user()->id, ['created_at' => now(), 'updated_at' => now()]);

            return redirect()->route('set-all-room');
        }
    }
    public function delete(Request $request)
    {
        // User_room::where('rooms_id', $request->room_id)->delete();
        // Room::find($request->room_id)->delete();
        // return redirect()->back();
    }
    public function logout(Request $request)
    {
        // User_room::where('users_id', Auth::user()->id)->where('rooms_id', $request->room_id)->delete();
        // return redirect()->back();
        $room = Room::find($request->room_id);
        $room->users()->detach(Auth::user()->id);
        return redirect()->back();
    }
    public function addMember(Request $request)
    {
        // $findUser = User::where('name', $request->name)->get();
        // if ($findUser->count() == 1) {
        //     $CheckRoom = User_room::where('users_id', $findUser[0]->id)->where('rooms_id', $request->room_id)->first();
        //     if (empty($CheckRoom)) {
        //         $users_room = array('users_id' => $findUser[0]->id, 'rooms_id' => $request->room_id);
        //         User_room::create($users_room);
        //         return redirect()->route('set-all-room');
        //     } else {
        //         return "<h1>Alredy Added</h1>";
        //     }
        // } else {
        //     return "<h1> User Not Found</h1>";
        // }
    }
    function show(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $rooms = $user->rooms->toArray();
        return view('home', compact('rooms'));
    }
}
