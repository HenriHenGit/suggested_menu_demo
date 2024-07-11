<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view('user.auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $userId = Auth::user()->id;

            session(['userId' => $userId]);

            return redirect()->route('foods.index')->with('success', 'Đăng nhập thành công!');
        } else {
            return redirect()->route('login')->with('error', 'Email hoặc mật khẩu không đúng.');
        }
    }


    public function rIndex()
    {

        return view('user.auth.register');
    }

    public function rStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|unique:users,phone|max:20',
            'age' => 'required|integer|min:18|max:100',
            'gender' => 'required|in:0,1',
            'password' => 'required|string|min:6|confirmed',
        ]);


        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'age' => $validatedData['age'],
            'gender' => $validatedData['gender'],
            'level' => 1,
            'password' => bcrypt($validatedData['password']),
        ]);

        return redirect()->route('login.index')->with('success', 'Đăng ký thành công!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.index')->with('success', 'Đăng xuất thành công!');
    }
}