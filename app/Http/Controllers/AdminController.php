<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{

    // ------------------ Start of Admin Profile Method -------------------
    public function profile(){
        $id         = Auth::user()->id;
        $admin_data = User::find($id);

        return view('admin.admin_profile_view', compact('admin_data'));
    }
    // ------------------ End of Admin Profile Method -------------------




    // ------------------ Start of Show Admin Profile Edit Page Method -------------------
    public function editProfile(){
        $id        = Auth::user()->id;
        $edit_data = User::find($id);

        return view('admin.admin_profile_edit', compact('edit_data'));
    }
    // ------------------ End of Show Admin Profile Edit Page Method -------------------





    // ------------------ Start of Store Admin Profile Edit Method -------------------
    public function storeProfile(Request $request){
        $the_user = Auth::user();

        $the_user->name = $request->name;
        $the_user->email = $request->email;
        $the_user->username = $request->username;

        if($request->file('profile_image')){
            $file = $request->file('profile_image');

            $file_name = date('YmdHi') . $file->getClientOriginalName();

            $file->move(public_path('images/admin_images'), $file_name);

            $the_user->profile_image = $file_name;
        }
        $the_user->save();

        $notification = array(
            'message' => 'Admin Profile Update Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    }
    // ------------------ End of Store Admin Profile Edit Method -------------------




    // ------------------ Start of Admin Logout Method ---------------------
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            "message" => "User Logout Successfully",
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    }
    // ------------------ End of Admin Logout Method ---------------------





    // ----------------- Start of Chnage Password Method ---------------
    public function changePassword()
    {
        return view('admin.admin_change_password');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $validate_data = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password'
        ]);

        $user_existed_password = $user->password;

        if(Hash::check($request->old_password, $user_existed_password)){
            $user->update([
                'password' => Hash::make($request->new_password)
            ]);

            session()->flash('message', 'Password Updated Successfully');
            return redirect()->back();
        }
        else{
            session()->flash('message', 'Old Password did not match');
            return redirect()->back();
        }
    }
    // ----------------- End of Chnage Password Method ---------------






} // End of class
