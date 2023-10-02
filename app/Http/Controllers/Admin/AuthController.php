<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Support\Str;
use App\Mail\ForgotPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function getLoginPage()
    {
        return view('admin.auth.login');
    }
    public function Login(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $remember_me = ($request->remember_me) ? true : false;
        if (!Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $remember_me)) {
            return back()->with('error', 'Invalid email or password');
        }

        return redirect('admin');
    }

    public function getRegisterPage()
    {
        return view('admin.auth.register');
    }

    public function Register(Request $request)
    {

        return redirect('admin');
    }

    public function forgetPassword()
    {
        return view('admin.auth.forgetPassword');
    }

    public function resetPasswordLink(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:admins,email',
        ]);
        $exists = DB::table('password_reset_tokens')->where('email', $request->email)->first();
        if ($exists) {
            return back()->with('error', 'Reset Password link has been already sent');
        } else {
            $token = Str::random(30);
            DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'token' => $token,
            ]);

            $data['url'] = url('change_password', $token);
            Mail::to($request->email)->send(new ForgotPassword($data));
            return back()->with('success', 'Reset Password Link Send to your mail Successfully');
        }
    }
    public function change_password($id)
    {

        $user = DB::table('password_reset_tokens')->where('token', $id)->first();

        if (isset($user)) {
            return view('admin.auth.resetPassword', compact('user'));
        }
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8',
            'confirm-password' => 'required|same:password',
        ]);

        $tags_data = [
            'password' => bcrypt($request->password),
        ];
        if (Admin::where('email', $request->email)->update($tags_data)) {
            DB::table('password_reset_tokens')->where('email', $request->email)->delete();
            return redirect('admin/login')->with('success','Password Reset Successfully');
        }

    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
