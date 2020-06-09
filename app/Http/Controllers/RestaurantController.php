<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class RestaurantController extends Controller
{
    //

    public function all_restaurant(){
        return User::with('avgreview')->where('user_type','Restaurant')
                    ->where('request_status','Approved')->get();
    }

    public function all_restaurant_pagi(Request $request){
        $total = $request->total;
        $data = User::with('avgreview')
        ->where('user_type','Restaurant')
        ->orderBy('id','desc');
        return $data->paginate($total);
    }

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
        return User::with('avgreview')->where('id',$id)->with('food','review.user')->first();
    }

    public function all_city_restaurant ($id) {
        return User::with('avgreview','city')->where('city_id',$id)->where('request_status','Approved')->get();
    }





}
