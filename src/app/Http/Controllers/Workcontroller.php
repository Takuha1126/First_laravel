<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Address;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WorkController extends Controller
{
    public function index() {
        $user = Auth::user()->name;
        return view('index',compact('user'));
    }
    public function create(Request $request) {
        $form = Carbon::now();
        Work::create($form);
        $user = Auth::user();
        return view('/',compact('user'));
        }
}