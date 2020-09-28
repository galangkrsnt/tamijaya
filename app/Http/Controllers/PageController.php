<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function bus(){
        return view('bus');
    }

    public function about(){
        return view('about');
    }

}
