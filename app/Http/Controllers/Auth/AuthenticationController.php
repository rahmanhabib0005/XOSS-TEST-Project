<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }



    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt($request->only(['email', 'password']))) {
            return redirect('/')->with('success', 'Logged in Successfully...!');
        } else {
            return back()->with('error', 'Invalid Credentials...!');
        }
    }


    public function showRegisterForm()
    {
        return view('auth.registration');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 1,
        ];

        $user = User::create($userData);
        if($user->id == 1){
            $users = User::find($user->id);
            $users->update([
                'role' => 2
            ]);
        }

        Auth::login($user);
        return redirect('/')->with('success', 'Registration & Logged in Successfully...!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/')->with('success', 'Logout Successfull...!');
    }
}
