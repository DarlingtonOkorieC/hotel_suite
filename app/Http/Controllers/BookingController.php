<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Booker;
use App\Models\Room;
use Auth;


class BookingController extends Controller
{
    //

    public function mark(Request $request, $id){
        $b = Booker::find($id);

        $b->opened = 1;
        $b->save();

        return redirect()->back()->with('success', 'Marked!');
    }

    public function open($title){
        $hotel = Hotel::where('title', $title)->first();

        return view('page.users',compact('hotel'));
    }
    public function roombook($id){
        $room = Room::findOrFail($id);
        return view('users.book',compact('room'));
    }

    public function create($id){
        if(Auth::check()){
        $hotel = Hotel::find($id);
        return view('page.form', compact('hotel'));
    }
    else{
        return redirect()->route('login')->with('message', 'Please Login then continue booking.');
    }
    }
    
    public function book(Request $request, $id){
        $hotel = Hotel::find($id);
        $user = Auth::user();
        $this->validate($request,[
            'phone' => 'required',
            'photo' => 'required',
            'location' => 'required',
            'duration' => 'required'
        ]);
        $file = $request->photo;
        $file_new_name = time().$file->getClientOriginalName();

        $file->move('uploads/files',$file_new_name);

       $booker = Booker::create([
            'user_id' => $user->id,
            'location' => $request->location,
            'duration' => $request->duration,
            'photo' => 'uploads/files/'.$file_new_name,
            'hotel_id' => $hotel->id,
            'phone' => $request->phone
        ]);

        if($request->has('requirement')){
            $booker->requirement = $request->requirement;
            $booker->save();
        }

        return redirect()->route('dashboard')->with('success', 'Saved successfully. Book Another?');

    }

    public function bookroom(Request $request, $id){
        $room = Room::find($id);
        $user = Auth::user();
        $this->validate($request,[
            'phone' => 'required',
            'photo' => 'required',
            'location' => 'required',
            'duration' => 'required'
        ]);
        $file = $request->photo;
        $file_new_name = time().$file->getClientOriginalName();

        $file->move('uploads/files',$file_new_name);


       $booker = Booker::create([
            'user_id' => $user->id,
            'location' => $request->location,
            'duration' => $request->duration,
            'photo' => 'uploads/files/'.$file_new_name,
            'room_id' => $room->id,
            'hotel_id' => $room->hotel->id,
            'phone' => $request->phone
        ]);

        if($request->has('requirement')){
            $booker->requirement = $request->requirement;
            $booker->save();
        }

        if($request->has('requirement')){
            $booker->requirement = $request->requirement;
            $booker->save();
        }

        return redirect()->route('dashboard')->with('success', 'Saved successfully. Book Another?');

    }

    public function userinfo(){
        if(Auth::check()){
            return view('users.info');
        }
    }
    public function managerinfo(){
        if(Auth::check())
        if(Auth::user()->isManager){
            return view('managers.info');
        }
        else{
            return redirect()->back('message', 'You are not a hotel owner');
        }
    }
}

