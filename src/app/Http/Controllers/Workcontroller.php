<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Address;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\WorkRequest;

class WorkController extends Controller
{
    public function index() {
        $user = Auth::user()->name;
        return view('index',compact('user'));
    }
    public function create() {
        $user = Auth::user();

        $oldStartTime = Work::where('user_id',$user->id)->latest()->first();

        $oldDay= '';

        if($oldStartTime) {
            $oldTimePunchIn = new Carbon($oldStartTime->punchIn);
            $oldDay = $oldTimePunchIn->startOfDay();
        }
        $today = Carbon::today();

        if(($oldDay == $today) && (empty($oldStartTime->punchOut))) {
            return redirect()->back()->with('message','出勤打刻済みです');
        }

        if($oldStartTime) {
            $oldTimePunchOut = new Carbon($oldStartTime->punchOut);
            $oldDay = $oldTimePunchOut->startOfDay();
        }

        if(($oldDay == $today)) {
            return redirect()->back()->with('message','退勤打刻済みです');
        }

        $time = Work::create([
            'user_id' => $user->id,
            'start_time' => Carbon::now(),
        ]);

        return redirect()->back();

    }

    public function store(Request $request){
        $user = Auth::user();
        $end_time = Work::where('user_id',$user->id)->latest()->first();
        $now = new Carbon();
        $start_time = new Carbon( $end_time->start_time);
        $startRestTime = new Carbon( $end_time->startRestTime);
        $endRestTime = new Carbon( $end_time->endRestTime);
        $stayTime = $start_time->diffInMinutes($now);
        $breakTime =  $startRestTime->diffInMinutes($endRestTime);
        $workingMinute = $stayTime - $breakTime;
        $workingHour = ceil($workingMinute / 15) * 0.25;

        if($end_time) {
            if(empty($end_time->punchOut)) {
                if($end_time->startRestTime && !$end_time->endRestTime) {
                    return redirect()->back()->with('message','休憩打刻が押されていません');
                }else{
                    $end_time->update([
                        'end_time' => Carbon::now(),
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
        }else{
            return redirect()->back()->with('message','出勤打刻がされていません');
        }

        }
        


    public function break()
    {
        $user = Auth::user();
        $breakTime = Work::where('user_id',$user->id)->latest()->first();
        $breakIn = new Carbon($breakTime->breakIn);
        $breakOut = new Carbon($breakTime->breakOut);
        $rest_time =$breakIn->diffInMinutes($breakOut);

        $rest_time->update([
            'rest_time' => $rest_time
        ]);
        return redirect()->back();

    }

    
}
