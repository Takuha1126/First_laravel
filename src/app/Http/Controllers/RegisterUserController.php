<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;

class RegisterUserController extends Controller
{
    public function create(Request $request) {
    Address::create([
        "name" => $request->name,
        "email" => $request->email,
        "password" => $request->password,
    ]);
    return redirect("/");
}
}
