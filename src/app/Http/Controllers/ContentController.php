<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;

class ContentController extends Controller
{
    public function attendance() {
        $authors = Work::paginate(5)->onEachSide(1);
        return view ('attendance', compact('authors'));
    }
    public function store(){

    }
}
