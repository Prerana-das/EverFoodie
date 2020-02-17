<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Restaurant;

class RestaurantController extends Controller
{
    //

    // public function allRestaurant(){
    //     return Restaurant::all();
    // }


    public function upload(Request $request)
    {
       \Log::info($request->all());
        
        request()->file('image')->store('uploads');
        $pic= $request->image->hashName();
        $pic= "/uploads/$pic";
        return response()->json([
            'imageUrl'=> $pic
        ],200);
    }

   


    


    public function singleRestaurant ($id) {
        // return User::where('id',$id)->first();
        return User::where('id',$id)->with('food')->first();
    }

    public function cityRestaurant ($id) {
        return User::where('id',$id)->first();
    }





}
