<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Hotel;
use App\Models\Gallery;

class PageController extends Controller
{
    public function view(){
        if(Auth::check()){
            if(Auth::user()->isManager){
        $galleries = Gallery::where('hotel_id', '=', Auth::user()->manager->hotel->id)->get();
        $hotel = Hotel::where('manager_id', '=', Auth::user()->manager->id)->get();
            
        return view('page.view',compact('galleries', 'hotel'));
        
    }
    else{
        return redirect()->route('page.view')->with('message', 'You are not a hotel owner. Book One?');
    }
        }
        else{
            return redirect()->route('login')->with('message', 'Please login');
        }
    }
}
