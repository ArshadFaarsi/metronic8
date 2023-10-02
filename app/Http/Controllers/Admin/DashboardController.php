<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function getdashboard()
    {
        $page_data = array();

        $users = DB::table('users')->count();
        $page_data['total_user'] = $users;

        $page_data['total_user_balance'] = 1000;

        $page_data['used_wallet'] = 800;

        $page_data['orders'] = 390;
        return view('admin.dashboard.index', compact('page_data'));

    }

    public function getProfile()
    {
        $data = Admin::find(Auth::guard('admin')->id());
        return view('admin.profile.index', compact('data'));
    }

    public function update_profile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);

        $admin = Admin::find(Auth::guard('admin')->id());

        if ($request->hasfile('avatar')) {
            $destination = 'public/assets/media/avatars/' . $admin->avatar;
            if (File::exists($destination) || File::exists($admin->avatar)) {
                File::delete($destination);
                File::delete($admin->avatar);
            }
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('public/assets/media/avatars/', $filename);
            $avatar = 'public/assets/media/avatars/' . $filename;
        } else {
            $avatar = $admin->avatar;
        }

        $admin->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'image' => $avatar,
        ]);

        return back()->with('success', 'Profile Updated Successfully');
    }

    public function changeEmail(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::find(Auth::guard('admin')->id());

        if (Hash::check($request->password, $admin->password)) {
            $admin->update([
                'email' => $request->email,
            ]);
            return back()->with('success', 'Email Updated Successfully');
        } else {
            return back()->with('error', 'There are something Wrong');
        }
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'currentpassword' => 'required',
            'newpassword' => 'required',
            'confirmpassword' => 'required|same:newpassword',
        ]);

        $admin = Admin::find(Auth::guard('admin')->id());

        if (Hash::check($request->currentpassword, $admin->password)) {
            $admin->update([
                'password' => bcrypt($request->newpassword),
            ]);
            return back()->with('success', 'Password Updated Successfully');
        } else {
            return back()->with('error', 'There are something Wrong');
        }
    }
}
