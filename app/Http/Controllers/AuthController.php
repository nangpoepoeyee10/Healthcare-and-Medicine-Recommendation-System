<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // login
    public function loginUser(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            return redirect()->route('dashboard');
        } else {
            return redirect('/');
        }
    }

    // register
    public function register(Request $request)
    {
        return view('auth.register');
    }

    // forgotPasswordPage
    public function forgotPasswordPage()
    {
        return view('auth.forgot-password');
    }

    // forgotPassword
    public function forgotPassword(Request $request)
    {
        // dd($request->toArray());
        Validator::make($request->all(), [
            'email' => 'required|exists:users,email',
        ], [])->validate();

        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        Mail::send('auth.forgetPasswordLink', ['token' => $token], function ($message) use ($request) {
            $message->from('nangpoepoeyee189@gmail.com');
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with(['message' => 'reset password has been send']);
    }

    // resetPasswordPage
    public function resetPasswordPage($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    // resetPassword
    // public function resetPassword(Request $request)
    // {
    //     Validator::make($request->all(), [
    //         'email' => 'required|email|exists:users,email',
    //         'password' => 'required|min:8|confirmed',
    //         'password_confirmation' => 'required|min:8',
    //     ], [])->validate();
    //     $data = DB::table('password_resets')->where([
    //         'email' => $request->email,
    //         'token' => $request->token,
    //     ])->first();
    //     if (!$data) {
    //         return back()->withInput()->with(['message' => 'something went wrong.']);
    //     }

    //     $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
    //     DB::table('password_resets')->where(['email' => $request->email])->delete();
    //     toast('Password has been changed', 'success');

    //     return redirect('/')->with('message', 'Password has been changed!');
    // }
}
