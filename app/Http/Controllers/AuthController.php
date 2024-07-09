<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('user.auth.login'); // Tạo file view này để hiển thị form đăng nhập
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->isAdmin()) {
                return redirect()->route('admin.foods.index');
            } else {
                return redirect()->route('foods.index');
            }
        }

        return redirect()->back()->withErrors(['message' => 'Thông tin đăng nhập không chính xác.']);
    }
}