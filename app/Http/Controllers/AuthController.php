<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class AuthController extends Controller
{
    public function login()
    {
        $pageTitle = 'Login';
        return view('front.admins.auth.login', compact('pageTitle'));
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            
            return redirect()->route('admin.visits');
                       
        }
  
        return redirect()->route('login')->with('error','Sai tài khoản hoặc mật khẩu');
    }
    public function logOut()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('login');
    }
}