<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller
{
    public function index()
    {

        $hotel = Auth::user();
        return view('hotel.show',compact('hotel'));
    }

    public function profile(Request $request)
    {
        $hotel = Auth::user();
        $cities = City::all();
        return view('hotel.profile',compact('hotel','cities'));
    }

    public function update(Request $request)
    {
       $hotel = Hotel::find(Auth::id());
       if (!$request->cover ==null){
           $request->cover = $request->cover->store('hotel','public');
       }else{
           $request->cover = Auth::user()->cover;
       }
       $hotel->update([
           'name' =>$request->name,
           'city_id' =>$request->city_id,
           'details' =>$request->details,
           'cover' =>$request->cover,
       ]);
//       $hotel->save();
        return redirect(route('hotel'))->with('status','hotel updated');
    }

    public function loginForm()
    {
        return view('hotel.login');
    }

    public function login(Request $request)
    {
        $user = $request->only(['email' , 'password']);
        if (Auth::guard('hotel')->attempt($user)){
            return redirect(route('hotel'));
        }else{
            return redirect()->back()->with('massage','eeeee');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect(route('hotel.login'));
    }
}
