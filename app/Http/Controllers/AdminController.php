<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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




    // ------------------ Start of Admin Logout Method ---------------------
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    // ------------------ End of Admin Logout Method ---------------------








} // End of class
