<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Gallery;
use App\Models\Room;
use Auth;
use App\Models\Address;
use Illuminate\Http\Request;

class HotelController extends Controller
{

     public function __construct(){
    $this->middleware('auth');
     }
    public function galleryup(){
        if(Auth::check()){
        return view('hotel.gall');
    }
    else{
        return redirect()->route('hotel.create')->with('You need to open a manager account or login to access this page');
    }
}
    public function galleryview(){
        $galleries = Gallery::where('hotel_id', '=', Auth::user()->manager->hotel->id)->get();
        
        return view('hotel.viewgal', compact('galleries'));
    }
    public function gallerysave(Request $request){
        $this->validate($request,[
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $file = $request->photo;
        $file_new_name = time().$file->getClientOriginalName();

        $file->move('uploads/hotels',$file_new_name);

             Gallery::create([
                    'photo' => 'uploads/hotels/' .$file_new_name,
                    'hotel_id' => Auth::user()->manager->hotel->id
                ]);
                    Session::flash('message', 'Photo successfully uploaded');
                    return redirect()->route('gallery_view')->with('message', 'Successfully Uploaded!');
        }

        public function roomadd(){
            if(Auth::check()){
                return view('hotel.room');
            }
            
        }
        
        public function roomsave(Request $request){
            $user = Auth::user();
            $this->validate($request,[
                'name' => 'required',
                'number' => 'required',
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'pricing' => 'required'
            ]);
                $file = $request->photo;
                $file_new_name = time(). $file->getClientOriginalName();
                $file->move('rooms/files/', $file_new_name);

            $r = Room::create([
                'name' => $request->name,
                'photo' => 'rooms/files/' . $file_new_name,
                'number' => $request->number,
                'pricing' => $request->pricing,
                'hotel_id' => Auth::user()->manager->hotel->id
            ]);
            if($request->has('address_id')){
                $r->address_id = $request->address_id;
                $r->save();
            }
                $usehotels = Room::where('hotel_id', '=', Auth::user()->manager->hotel->id)->get();
                if(count(Auth::user()->manager->hotel->rooms) > 0 ){
                    $user->count += 30;
                    $user->save();
                }
            return redirect()->route('room.view')
            ->with('success', 'You have successfully uploaded the Room');
        }
        public function branchsave(Request $request){
            $this->validate($request,[
                'address' => 'required|string'
            ]);

            $user = Auth::user();

            Address::create([
                'address' => $request->address,
                'hotel_id' => Auth::user()->manager->hotel->id
            ]);
            $branch = Address::where('hotel_id', '=', Auth::user()->manager->hotel->id)->get();
                if(count(Auth::user()->manager->hotel->adresses) > 0 && count(Auth::user()->manager->hotel->adresses) === 1){
                    $user->count += 30;
                    $user->save();
                }
        return redirect()->route('branches')
        ->with('success', 'You have successfully add the branch');
        }

        public function roomview(){
            $usehotels = Room::where('hotel_id', '=', Auth::user()->manager->hotel->id)->get();

            return view('hotel.viewroom',compact('usehotels'));
        }

        public function branches(){
            if(isset(Auth::user()->manager->hotel->addresses)){
            $branches = Address::where('hotel_id', '=', Auth::user()->manager->hotel->id)->get();


            return view('hotel.branches',compact('branches'));
            }else{
                return redirect()->route('branch.add')->with('message', `You need to Upload A Branch as you don't have any`);
            }
        }
      
        public function branchadd(){
            return view('hotel.brand');
        }

        public function roomedit($id){
            $r = Room::find($id);
            $addresses = Address::all();

            return view('hotel.roomed',compact('r', 'addresses'));
        }

        public function roomupdate(Request $request, $id){
            $r = Room::find($id);

            if($request->hasFile('photo')){
                $photo = $request->photo;
                $photo_new_name = time() . $photo->getClientOriginalName();
                $photo->move('rooms/files/', $photo_new_name);
    
                $r->photo = 'rooms/files/' . $photo_new_name;
            }

            if($request->has('number')){
                $r->number = $request->number;
            }
            
            if($request->has('name')){
                $r->name = $request->name;
            }
            if($request->has('pricing')){
                $r->pricing = $request->pricing;
            }
            if($request->has('address_id')){
                $r->address_id = $request->address_id;
            }

            $r->save();
            return redirect()->route('room.view')
            ->with('success', 'You have successfully updated The Room');
        }

        public function roomdelete($id){
            $r = Room::findOrFail($id);
            
            // Laravel's Way
            // $destinationPath = 'your_path';
            // File::delete($destinationPath.'/your_file');

                 unlink(public_path().'rooms/files/'.$r->photo);
                
                $r->delete();

                Session::flash('deleted_user','The user has been deleted');

    return redirect('/admin/users');
         $r->delete();

            return redirect()->back()
            ->with('message', 'Successfully deleted Room');
        }
        public function branchdelete($id){
            $b = address::find($id);

            $b->delete();

            return redirect()->back()
            ->with('message', 'Successfully deleted Room');
        }

}