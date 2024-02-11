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
    public function create() {
        $user = Auth::user();

        $oldTimestamp = Work::where('user_id',$user->id)->latest()->first();
        if($oldTimestamp) {
            $oldTimestampPunchIn = new Carbon($oldTimestamp->start_time);
            $oldTimestampDay = $oldTimestampPunchIn->startDay();
        }else{
            $timestamp = Work::create([
                'user_id' => $user->id,
                'start_time' => Carbon::now(),
            ]);
            return redirect()->back();
        }

        $newTimestampDay = Carbon::today();

        if(($oldTimestampDay == $newTimestampDay) && (empty($oldTimestamp->end_time))){
            return redirect()->back();
        }
        $timestamp = Work::create([
            'user_id' => $user->id,
            'start_time' => Carbon::now(),
        ]);
        return redirect()->back();

    }

    public function store(){
        $user = Auth::user();
        $end_time = Work::where('user_id',$user->id)->latest()->first();
        $now = new Carbon();
        $start_time = new Carbon($end_time->start_time);
        dd($start_time);
        $rest_time = new Carbon($end_time->rest_time);
        $stayTime = $start_time->diffInMinutes($now);
        $workingMinute = $stayTime - $rest_time;
        $workingHour = ceil($workingMinute / 15) * 0.25;

        if($end_time) {
            if(empty($end_time->punchOut)) {
                if($end_time->rest_time) {
                    return redirect()->back()->with('message','休憩打刻が押されていません');
                }else{
                    $end_time->update([
                        'punchOut' => Carbon::now(),
                        'work_time' => $workingMinute
                    ]);
                    return redirect()->back();
                }
            }else{
                $today = new Carbon();
                $day = $today->day;
                $oldPunchOut = new Carbon();
                $oldPunchOutDay = $oldPunchOut->day;
                if($day == $oldPunchOutDay) {
                    return redirect()->back()->with('message','退勤済みです');
                }else{
                    return redirect()->back()->with('message','出勤打刻が押されていません');
                }
            }
        }
        
    }

    
}
