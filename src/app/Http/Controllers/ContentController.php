<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ContentController extends Controller
{
    public function attendance() {
        $works = Work::paginate(5);
        $user = User::all()->first;
        $authors = $user->works;


        return view ('attendance',compact('authors'));
    }
    
    public function store(Request $request){
        $name = User::all()->first;
        $works = $name->works;

        return redirect('attendance',compact('works'));


    }
}
