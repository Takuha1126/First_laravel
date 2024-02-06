<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;

class RegisterUserController extends Controller
{
    public function register(Request $request){
            return view('auth.register');
    }
    public function create(Request $request) {
    Address::create([
        "name" => $request->name,
        "email" => $request->email,
        "password" => $request->password,
    ]);
    return redirect("/");
}
    public function store(Request $request){

    }
}