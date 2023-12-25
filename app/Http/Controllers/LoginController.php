<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function loginView()
    {
        return view('admin.login');
    }
    function login(Request $request)
    {
        $credentials = $request->only('name', 'password');
        $password = $request->only('password');
        session()->put("userPass",$password);
        if (Auth::attempt($credentials)) {
            return redirect('transcript');
        }
        return redirect('login')->with('success', 'Login details are not valid');
    }
    function registerView()
    {
        return view('admin.register');
    }
    function register(Request $request)
    {
        $data = $request->all();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);
        return redirect('login')->with('success', 'Registration Completed, now you can login');
    }
    function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
