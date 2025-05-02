<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('templatemo.about');  
    }

    public function contact()
    {  
        return view('templatemo.contact');
    }

    public function photoDetail()
    {
        return view('templatemo.photo-detail');  
    }

    public function videoDetail()
    {  
        return view('templatemo.video-detail');
    }
}
