<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Restaurant;

class RestaurantController extends Controller
{
    //

    public function allRestaurant(){
        return Restaurant::all();
    }

    public function storeRestaurant(Request $request){
        $data = $request->all();
        return Restaurant::create($data);
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

    public function updateRestaurant(Request $request){
        $data = $request->all();
        \Log::info($data);
        return Restaurant::where('id',$data['id'])->update($data);
    }
    public function deleteRestaurant(Request $request){
        $data = $request->all();
        return Restaurant::where('id',$data['id'])->delete();
    }


    public function changeIt(Request $request){
        $data = $request->all();
        
        if($data['request_status']=='approve') $data['request_status'] = 'Pending';
        if($data['request_status']=='pending') $data['request_status'] = 'Approved';

        return Restaurant::where('id',$data['id'])->update($data);

    }





}
