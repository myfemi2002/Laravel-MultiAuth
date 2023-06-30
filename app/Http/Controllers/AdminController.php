<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Image;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AdminDashboard(){

        return view('admin.index');
    } // End Mehtod

    public function AdminLogin(){
        return view('admin.admin_login');
    } // End Mehtod

    public function AdminDestroy(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Logout Successfully',
            'alert-type' => 'success'
        );
        return redirect('/admin/login')->with($notification);

    } // End Mehtod

    public function AdminProfile(){
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view',compact('adminData'));
    } // End Mehtod

    public function AdminProfileStore(Request $request){
        $validateData = $request->validate([
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'photo' => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ],
        [
            'name.required' => 'Please Input name',
            'email.required' => 'Please Input email',
            'phone.required' => 'Please Input phone',
            'photo.min' => 'Image Longer Than 4 Characters',
        ]);
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        $data->address = $request->address;

        if ($request->file('photo')) {
            $image = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1000, 1000)->save('upload/admin_images/' . $name_gen);
            $last_img = 'upload/admin_images/' . $name_gen;
            $data['photo'] = $name_gen;
        }
        $data->save();
        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // End Mehtod

    public function AdminChangePassword(){
        return view('admin.admin_change_password');
    } // End Mehtod

    public function AdminUpdatePassword(Request $request){
        $validateData = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
                ],
                [
                    'old_password.required' => 'Please Input Old password',
                    // 'new_password_confirmation.required' => 'Please Input confirm password',
                ]);

        // Match The Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {

        $notification = array(
            'message' => 'Wrong old password',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
        }
        // Update The new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'Password Successfully Changed',
            'alert-type' => 'success'
        );
        return redirect('/admin/login')->with($notification);
    } // End Mehtod

    public function InactiveVendor(){
        $inActiveVendor = User::where('status','inactive')->where('role','vendor')->latest()->paginate(6);
        return view('backend.vendor.inactive_vendor',compact('inActiveVendor'));
    }// End Mehtod


    public function ActiveVendor(){
        $ActiveVendor = User::where('status','active')->where('role','vendor')->latest()->get();
        return view('backend.vendor.active_vendor',compact('ActiveVendor'));

    }// End Mehtod

    public function InactiveVendorDetails($id){
        $inactiveVendorDetails = User::findOrFail($id);
        return view('backend.vendor.inactive_vendor_details',compact('inactiveVendorDetails'));

    }// End Mehtod

    public function ActiveVendorApprove(Request $request){
        $verdor_id = $request->id;
        $user = User::findOrFail($verdor_id)->update([
            'status' => 'active',
        ]);
        $notification = array(
            'message' => 'Vendor Active Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('active.vendor')->with($notification);
    }// End Mehtod

    public function ActiveVendorDetails($id){
        $activeVendorDetails = User::findOrFail($id);
        return view('backend.vendor.active_vendor_details',compact('activeVendorDetails'));
    }// End Mehtod

    public function InActiveVendorApprove(Request $request){
        $verdor_id = $request->id;
        $user = User::findOrFail($verdor_id)->update([
            'status' => 'inactive',
        ]);
        $notification = array(
            'message' => 'Vendor InActive Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('inactive.vendor')->with($notification);
    }// End Mehtod
}
