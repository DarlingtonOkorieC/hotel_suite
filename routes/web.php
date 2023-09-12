<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Hotel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'uses' => 'App\Http\Controllers\HomeController@index',
    'as' => 'index'
]);

Route::get('/pricing', [
    'uses' => 'App\Http\Controllers\ManagerController@pricing',
    'as' => 'pricing'
]);
Route::post('/prisave/{id}', [
    'uses' => 'App\Http\Controllers\ManagerController@pricesave',
    'as' => 'prisave'
]);

Route::get('gallery/uploads', [
    'uses' => 'App\Http\Controllers\HotelController@galleryup',
    'as' => 'gallery_upload'
]);
Route::get('gallery/add', [
    'uses' => 'App\Http\Controllers\HotelController@galleryup',
    'as' => 'gall.add'
]);

Route::get('gallery/view', [
    'uses' => 'App\Http\Controllers\HotelController@galleryview',
    'as' => 'gallery_view'
]);


Route::post('gallery/save', [
    'uses' => 'App\Http\Controllers\HotelController@gallerysave',
    'as' => 'gall.save'
]);



Route::get('/room/add',[
    'uses' => 'App\Http\Controllers\HotelController@roomadd',
    'as' => 'room.add'
]);
Route::get('/room/view',[
    'uses' => 'App\Http\Controllers\HotelController@roomview',
    'as' => 'room.view'
]);


Route::get('/room/delete/{id}',[
    'uses' => 'App\Http\Controllers\HotelController@roomdelete',
    'as' => 'room.delete'
]);

Route::get('/branch/delete/{id}',[
    'uses' => 'App\Http\Controllers\HotelController@branchdelete',
    'as' => 'branch.delete'
]);

Route::get('/branches',[
    'uses' => 'App\Http\Controllers\HotelController@branches',
    'as' => 'branches'
]);

Route::get('/branches/add',[
    'uses' => 'App\Http\Controllers\HotelController@branchadd',
    'as' => 'branch.add'
]);

Route::get('/room/edit/{id}',[
    'uses' => 'App\Http\Controllers\HotelController@roomedit',
    'as' => 'room.edit'
]);
Route::post('/room/update/{id}',[
    'uses' => 'App\Http\Controllers\HotelController@roomupdate',
    'as' => 'room.update'
]);

Route::post('room/save', [
    'uses' => 'App\Http\Controllers\HotelController@roomsave',
    'as' => 'room.save'
]);

Route::post('/branch/save',[
    'uses' => 'App\Http\Controllers\HotelController@branchsave',
    'as' => 'branch.save'
]);

Route::get('/profile/edit',[
    'uses' => 'App\Http\Controllers\ManagerController@profiledit',
    'as' => 'profile.edit'
]);

Route::post('/profile/update/',[
    'uses' => 'App\Http\Controllers\ManagerController@profileupdate',
    'as' => 'profile.update'
]);

Route::get('/view', [
    'uses' => 'App\Http\Controllers\PageController@view',
    'as' => 'view'
]);


Route::get('/register/hotel',[
    'uses' => 'App\Http\Controllers\ManagerController@create',
    'as' => 'hotel.create'
]);

Route::get('/booking/hotel/{id}',[
    'uses' => 'App\Http\Controllers\BookingController@create',
    'as' => 'hotel.book'
]);

Route::get('/book/room/{id}',[
    'uses' => 'App\Http\Controllers\BookingController@roombook',
    'as' => 'room.book'
]);

Route::post('/book/room/post/{id}',[
    'uses' => 'App\Http\Controllers\BookingController@bookroom',
    'as' => 'bookroom'
]);

Route::post('/mark/hotel/{id}',[
    'uses' => 'App\Http\Controllers\BookingController@mark',
    'as' => 'mark'
]);

Route::any('search',   function(Request $request){
    $city = $request->city;

    $hotels = \App\Models\Hotel::where('city', 'like', '%' . request('city') . '%')->paginate(5);
    
    if(count($hotels) > 0)
        return view('page.search')->with('hotels',$hotels)->withQuery ( $city );
    else {
        return view('page.search')
        ->withQuery ( $city )
        ->with('message', 'No Details found. Try to search again !');
    }
});



Route::post('/register/manager',[
    'uses' => 'App\Http\Controllers\ManagerController@store',
    'as' => 'manager.create'
]);
Route::get('/dashboard',[
    'uses' => 'App\Http\Controllers\ManagerController@dashboard',
    'as' => 'dashboard'
]);

Route::get('/{title}',[
    'uses' => 'App\Http\Controllers\BookingController@open',
    'as' => 'open.hotel'
]);


Route::get('/signin',[
    'uses' => 'App\Http\Controllers\ManagerController@signin',
    'as' => 'signin'
]);

Route::post('/signinpost',[
    'uses' => 'App\Http\Controllers\ManagerController@signpost',
    'as' => 'signin.post'
]);

Route::post('/hotel/complete/{id}',[
    'uses' => 'App\Http\Controllers\ManagerController@complete',
    'as' => 'hotel.complete'
]);

Route::get('/profile',[
    'uses' => 'App\Http\Controllers\ManagerController@profile',
    'as' => 'profile'
]);
Route::get('/profile/view',[
    'uses' => 'App\Http\Controllers\BookingController@managerinfo',
    'as' => 'hotelbook.info'
]);

Route::get('/hotel/info',[
    'uses' => 'App\Http\Controllers\BookingController@userinfo',
    'as' => 'hotels.info'
]);

Route::post('/hotel/post/book/{id}',[
    'uses' => 'App\Http\Controllers\BookingController@book',
    'as' => 'book'
]);


Auth::routes(['verify' => true]);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
