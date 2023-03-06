<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\userInfo;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    //login form show
    public function showLoginForm(){
        return view('authentication.login');
    }//end method

    //regestration form show

    public function showRegestrationForm(){
        return view('authentication.regester');
    }//end method

    public function signin(Request $request){
      if(Auth::guard('userinfo')->attempt(['email'=>$request->EmailOrUsername, 'password'=>$request->password])){
      return redirect()->route('dashboard');
      }
      else{
        return redirect()->route('showLoginForm')->with('errors','Email or Password Are Not Match');
      }
    }//end method

    public function Logout(){
        Auth::guard('userinfo')->logout();
        return redirect()->route('home');
        alert()->success('Success','Logout');
    }//end method

    public function SignUp(Request $request){
        $user = new userInfo;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->date_of_birth = $request->dateOfBirth;
        $user->created_at =  Carbon::now()->toDateTimeString();
        $result= $user->save();
        if( $result){
            return redirect()->route('showLoginForm')->with('errors','Regestrarion Successfully Please Login Heare');

        }

    }



}
