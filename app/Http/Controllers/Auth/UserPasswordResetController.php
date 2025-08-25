<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserPasswordResetController extends Controller
{
    // Tampilkan form permintaan reset password
    public function requestForm()
    {
        return view('auth.user-password-email');
    }

    // Proses kirim email reset password
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);
        $status = Password::broker('users')->sendResetLink(
            $request->only('email')
        );
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    // Tampilkan form reset password (dari link email)
    public function resetForm($token)
    {
        $email = request('email');
        return view('auth.user-password-reset', compact('token', 'email'));
    }

    // Proses reset password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $status = Password::broker('users')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->setRememberToken(Str::random(60));
                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('user.login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
} 