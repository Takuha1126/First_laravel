<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class WorkController extends Controller
{
    public function index() {
        return view('index');
    }
    public function create(Request $request) {
        $work = Carbon::now();
        $work = $request->all();
        $work->user_id = auth()->user()->id;
        Work::create($work);
        return redirect('/',);
        }
}
