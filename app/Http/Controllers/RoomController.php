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
            $room['created_by'] = Auth::user()->id;

            $details = Room::create($room); //create new room recored

            $room = Room::find($details->id); //add room_user recored 
            $room->users()->attach(Auth::user()->id, ['created_at' => now(), 'updated_at' => now()]);
            return redirect()->route('set-all-room');
        }
    }
    public function delete(Request $request)
    {
        $room = Room::find($request->room_id);
        $userId = array();
        foreach ($room->users->toArray() as $user) {
            array_push($userId,$user['id']);
        }
        $room->users()->detach($userId);
        Message::where('room_id',$request->room_id)->delete();
        $room->delete();
        return redirect()->back();
    }
    public function logout(Request $request)
    {
        $room = Room::find($request->room_id);
        $room->users()->detach(Auth::user()->id);
        return redirect()->back();
    }
    public function addMember(Request $request)
    {
        $room = Room::find($request->room_id);   //find room details
        if ($room->users->whereIn('name', $request->name)->count() < 1) {  //check room_user table in user is exixts or not
            $user = User::where('name', $request->name)->first();
            if ($user !== null && md5($user->name) == md5($request->name)) { //check user table in user exixts or not
                $room->users()->attach($user->id, ['created_at' => now(), 'updated_at' => now()]);
                return redirect()->back();
            } else {
                dd("Not Found");
            }
        } else {
            dd("Exixts");
        }
    }
    function show(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $rooms = $user->rooms->toArray();
        return view('home', compact('rooms'));
    }
}
