<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public function show(){
        $users = User::latest()->paginate(20);
        return view('backend.pages.users.manageuser',compact('users'));
    }

    public function userFromshow(){
        return view('backend.pages.users.useradd');
    }

    public function adduser(Request $request){
        $user = new User;
        $user->name = $request->userName;
        $user->email= $request->email;
        $user->password = Hash::make(($request->password));
        $user->save();
        if($user){
            alert()->success('Success','User Added Successfully');
            return redirect()->route('manage_user');
        }

    }
}
