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
        $user = Auth::user();

        $oldTimestamp = Work::where('user_id', $user->id)->latest()->first();
        if($oldTimestamp) {
            $oldTimestampStartTime = new Carbon($oldTimestamp->start_time);
            $oldTimestampDay = $oldTimestampStartTime->startOfDay();
        }
        $newTimestampDay = Carbon::today();

        if(($oldTimestampDay == $newTimestampDay) && (empty($oldTimestamp->EndTime))){
            return redirect()->back()->with('error','すでに出勤ボタンが押されています');
        }
        $timestamp = Work::create([
            'user_id' => $user->id,
            'start_time' => Carbon::now(),
        ]);
        return redirect()->back();
        }
}