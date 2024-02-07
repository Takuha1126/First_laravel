<?php

namespace App\Http\Controllers;


use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Fortify;
use App\Models\Address;


class AuthenticatedSessionController extends Controller
{
    public function login() {
        $user = Auth::user();
        return view('auth.login');
    }
    public function store(LoginRequest $request) {
        $user_id = Auth::id();
        $email = $request->only('email');
        $password = $request->only('password');
        if(Hash::check($password,$user_id->password)){
        return view('index');
        }else{
            return view('login');
        }
        

}
}
