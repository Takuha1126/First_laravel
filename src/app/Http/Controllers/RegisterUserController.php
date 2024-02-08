<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;


class RegisterUserController extends Controller
{
    public function register(Request $request){
            return redirect('auth.register');
    }
    public function create(RegisterRequest $request) {
    $user = Address::create([
        "name" => $request->name,
        "email" => $request->email,
        "password" => Hash::make($request->password),
    ]);
    return redirect("index")->with('flash_message','会員登録しました');
}
    public function store(Request $request){

    }
}