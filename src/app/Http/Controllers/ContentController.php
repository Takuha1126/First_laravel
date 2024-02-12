<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;

class ContentController extends Controller
{
    public function attendance() {
        $authors = Work::all();
        return view ('attendance',['authors' => $authors->toQuery()->paginate(5)]);
    }
    
    public function store(Request $request){
        $authors = Work::all();
        dd($authors);

        return view ('attendance',compact('authors'));


    }
}
