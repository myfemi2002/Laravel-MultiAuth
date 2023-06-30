<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ManagerDashboard(){
        return view('manager.index');
    } // End Mehtod

    public function ManagerLogin(){
        return view('manager.manager_login');
    } // End Mehtod

    public function ManagerDestroy(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'Logout Successfully',
            'alert-type' => 'success'
        );
        return redirect('/manager/login')->with($notification);

    } // End Mehtod
}
