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
            return view('auth.register');
    }
    public function create(Request $request) {
    $user = Address::create([
        "name" => $request->name,
        "email" => $request->email,
        "password" => Hash::make($request->password),
    ]);
    return redirect("/");
}
    public function store(Request $request){

    }
}