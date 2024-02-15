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
        $authors = Work::paginate(5);
        $this->date['authors']=$authors;
        return view('attendance',['authors'=>$authors]);
}
    public function create() {
        $breaks = Work::paginate(5);
        return view('attendance', ['breaks' => $breaks]);
    }

    public function store(Request $request){
        $this->validate($request);
        $form = $request->all();
        Work::create($form);
        return redirect('attendance');
    }
}
