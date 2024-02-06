<?php

namespace App\Http\Controllers;


use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function login() {
        return view('auth.login');
    }
    public function store(LoginRequest $request) {
        $credentials = $request->only('email','password');
        
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect('/')->with('login_success','ログイン成功しました');
        }else{return view('index')->withErrors([
            'login_error' => 'メールアドレスかパスワードが間違っています。',
        ]);
    }
    }
}

