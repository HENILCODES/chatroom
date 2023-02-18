<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function signup(){
        return view('user.signup');
    }

    public function login(){
        return view('user.login');
    }

    public function store(UserRequest $request)
    {
        //
        $user = $request->except('_token');
        User::create($user);
        return redirect()->route('user-login');
    }
    public function check(Request $request){
        $user = $request->except('_token');
        
        dd($user);
    }
}
