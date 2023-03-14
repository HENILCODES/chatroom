<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    //
    public function create(Request $request)
    {
        $file = $request->all();
        $name = $request->name->getClientOriginalName();
        $request->name->move(public_path('storage/upload/'), $name);
        $file['name'] = time().$name;

        $message = Message::create(['user_id' => Auth::user()->id, 'chat' => $name, 'room_id' => $request->room_id]);
        $file['message_id'] = $message->id;
        File::create($file);
        return redirect()->back();
    }
}
