<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function UserDashboard(){
        return view('user.index');
    } // End Mehtod

    public function UserLogin(){
        return view('user.user_login');
    } // End Mehtod

    public function UserDestroy(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'Logout Successfully',
            'alert-type' => 'success'
        );
        return redirect('/user/login')->with($notification);

    } // End Mehtod
}
